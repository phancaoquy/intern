<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $roles = Role::factory(5)->create();

        foreach ($users as $user) {
            foreach ($roles as $role) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]);
            }
        }
    }
}
