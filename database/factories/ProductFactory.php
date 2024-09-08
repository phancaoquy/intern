<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'product_name' => fake()->word(),
            'SKU' => fake()->ean13(),
            'listed_price' => fake()->randomFloat(2, 10, 100),
            'selling_price' => fake()->randomFloat(2, 10, 100),
            'quantity' => fake()->numberBetween(1, 100),
            'sold_quantity' => fake()->numberBetween(1, 50),
            'description' => fake()->paragraph(),
            'slug' => fake()->slug(),
        ];
    }
}
