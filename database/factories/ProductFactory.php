<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 5, 1000),
            'description' => $this->faker->sentence(12),
            'category_id' => \App\Models\Category::query()->inRandomOrder()->value('id') ?? 1,
            'urlimagen' => 'https://e01-elmundo.uecdn.es/assets/multimedia/imagenes/2022/10/12/16655773912126.jpg',
        ];
    }
}
