<?php

namespace Database\Seeders;

use App\Models\ProductCoupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCoupon::factory(20)->create();
    }
}
