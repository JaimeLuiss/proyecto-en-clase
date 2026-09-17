<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->decimal('price', 8, 2);
                $table->text('description');
                $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
                $table->string('urlimagen')->nullable();
                $table->timestamps();
            });

            return;
        }

        if (Schema::hasColumn('products', 'category_id') && Schema::hasColumn('products', 'name')) {
            return;
        }

        $legacyColumns = [
            'nombre' => 'name',
            'precio' => 'price',
            'descripcion' => 'description',
            'categoria' => 'categoria',
        ];

        $hasLegacyColumns = collect(array_keys($legacyColumns))->contains(fn ($column) => Schema::hasColumn('products', $column));

        if (! $hasLegacyColumns) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('description')->constrained()->cascadeOnDelete();
            });

            return;
        }

        DB::statement('PRAGMA foreign_keys = OFF');
        DB::statement('ALTER TABLE products RENAME TO products_old');

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('urlimagen')->nullable();
            $table->timestamps();
        });

        $legacyRows = DB::table('products_old')->get();

        foreach ($legacyRows as $row) {
            $categoryName = $row->categoria ?? null;
            $categoryId = null;

            if ($categoryName) {
                $categoryId = DB::table('categories')
                    ->where('name', trim((string) $categoryName))
                    ->value('id');

                if (! $categoryId) {
                    $categoryId = Category::query()->firstOrCreate(
                        ['name' => trim((string) $categoryName)],
                        ['description' => 'Categoría migrada automáticamente']
                    )->id;
                }
            }

            DB::table('products')->insert([
                'id' => $row->id,
                'name' => $row->name ?? $row->nombre ?? 'Producto',
                'price' => $row->price ?? $row->precio ?? 0,
                'description' => $row->description ?? $row->descripcion ?? '',
                'category_id' => $categoryId,
                'urlimagen' => $row->urlimagen ?? null,
                'created_at' => $row->created_at ?? now(),
                'updated_at' => $row->updated_at ?? now(),
            ]);
        }

        DB::statement('DROP TABLE products_old');
        DB::statement('PRAGMA foreign_keys = ON');
    }

    public function down(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        if (! Schema::hasColumn('products', 'category_id')) {
            return;
        }

        DB::statement('PRAGMA foreign_keys = OFF');
        DB::statement('ALTER TABLE products RENAME TO products_new');

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 10, 2);
            $table->text('descripcion');
            $table->string('categoria')->nullable();
            $table->string('urlimagen')->nullable();
            $table->timestamps();
        });

        $rows = DB::table('products_new')->get();

        foreach ($rows as $row) {
            $categoryName = DB::table('categories')->where('id', $row->category_id)->value('name');

            DB::table('products')->insert([
                'id' => $row->id,
                'nombre' => $row->name,
                'precio' => $row->price,
                'descripcion' => $row->description,
                'categoria' => $categoryName,
                'urlimagen' => $row->urlimagen,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        }

        DB::statement('DROP TABLE products_new');
        DB::statement('PRAGMA foreign_keys = ON');
    }
};