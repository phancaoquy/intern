<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = Page::whereIn('title', ['Home', 'Shop', 'About'])->get();
        foreach ($pages as $page) {
            Banner::create([
                'page_id' => $page->id,
                'banner_url' => fake()->url(), // Example URL
                'alt' => fake()->name(),
            ]);
        }

    }
}
