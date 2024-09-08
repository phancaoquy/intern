<?php

namespace Database\Factories;

use App\Models\ProductCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCoupon>
 */
class ProductCouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductCoupon::class;

    public function definition()
    {
        return [
            'coupon_id' => \App\Models\Coupon::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
