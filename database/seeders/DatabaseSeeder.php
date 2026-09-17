<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create or update a test user
        DB::table('users')->updateOrInsert(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // Seed categories and products. Disable foreign key checks briefly for SQLite.
        DB::statement('PRAGMA foreign_keys = OFF');

        $categories = [
            ['name' => 'Electrónica', 'description' => 'Dispositivos y gadgets', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hogar', 'description' => 'Artículos para el hogar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ropa', 'description' => 'Prendas y accesorios', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->updateOrInsert(['name' => $cat['name']], $cat);
        }

        // Create products using factory (all will use the same image defined in factory)
        Product::factory(100)->create();

        DB::statement('PRAGMA foreign_keys = ON');
    }
}
