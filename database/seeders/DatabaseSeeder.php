<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update Admin account
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
            ]
        );

        // Create or update Student account
        User::updateOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'Student User',
                'password' => Hash::make('Student@12345'),
                'role' => 'student',
            ]
        );
    }
}
