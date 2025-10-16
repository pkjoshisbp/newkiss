<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kissaquatics.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('KissAdmin2024!'), // Change this password after first login
                'email_verified_at' => now(),
            ]
        );
    }
}
