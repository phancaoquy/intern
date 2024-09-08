<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use App\Models\User;
use App\Models\UserSocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $socials = SocialMedia::factory(5)->create();

        foreach ($users as $user) {
            foreach ($socials as $social) {
                UserSocialMedia::create([
                    'user_id' => $user->id,
                    'social_media_id' => $social->id,
                    'link' => fake()->url(),
                ]);
            }
        }
    }
}