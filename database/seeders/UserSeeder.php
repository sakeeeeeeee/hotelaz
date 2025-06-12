<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hotelaz.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // Create regular user
        User::create([
            'name' => 'User',
            'email' => 'user@hotelaz.com',
            'password' => Hash::make('user123'),
            'is_admin' => false,
        ]);
    }
} 