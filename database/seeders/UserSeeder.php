<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@pykod.com',
            'role' => UserRole::Admin,
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Admin Pranto',
            'email' => 'pranto@pykod.com',
            'role' => UserRole::Admin,
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Shahadat Murshed',
            'email' => 'shahadat@gmail.com',
            'role' => UserRole::Admin,
            'password' => bcrypt('thaicho'),
        ]);
    }
}
