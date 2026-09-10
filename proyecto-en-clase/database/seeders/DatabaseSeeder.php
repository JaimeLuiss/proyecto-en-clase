<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
          
        ]);

        $categoy1 = new Category();
        $categoy1->name = 'Tecnologia';
        $categoy1->description = 'Productos tecnológicos';
        $categoy1->save();

        $categoy2 = new Category();
        $categoy2->name = 'Tecnologia';
        $categoy2->description = 'Productos tecnológicos';
        $categoy2->save();

        Category::factory(1000)->create();
    }
}