<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Variant::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'attribute_values_id' => AttributeValue::factory(),
        ];
    }
}
