<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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

        $categories1 = new Category();
        $categories1->name = 'Electronics';
        $categories1->description = 'Electronic devices and gadgets';
        $categories1->save();

        Product::factory(100)->create();
        Category::factory(1000)->create();
    }
}
