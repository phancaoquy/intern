<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UserSocialMediaSeeder::class,
            PageSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            ProductAttributeSeeder::class,
            VariantSeeder::class,
            CouponSeeder::class,
            ProductCouponSeeder::class,
        ]);
    }
}
