<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code' => strtoupper(fake()->bothify('??###')),
            'description' => fake()->sentence,
            'discount_values' => fake()->randomFloat(2, 5, 50),
            'time_used' => 0,
            'max_usage' => fake()->numberBetween(1, 100),
            'start_date' => fake()->dateTime,
            'end_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
        ];
    }
}