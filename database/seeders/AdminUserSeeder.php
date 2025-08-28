<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@etudesmaroc.com'], // 👈 change to your preferred admin email
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'), // 👈 change to a strong password
                'role' => 'admin',
            ]
        );
    }
}
