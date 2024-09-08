<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductImage::class;

    public function definition()
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'image_url' => fake()->imageUrl(),
            'is_thumb' => fake()->boolean(),
            'display_order' => fake()->numberBetween(1, 10),
        ];
    }
}