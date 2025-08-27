<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        foreach (['super_admin', 'school_admin', 'agent', 'participant'] as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create a Super Admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@study.ma'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('ChangeMe123'), // You can change this later
            ]
        );

        // Assign role
        $admin->assignRole('super_admin');
    }
}
