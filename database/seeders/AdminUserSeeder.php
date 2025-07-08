<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // 🔷 ini yang kurang

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );
    }
}
