<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Запустить заполнение базы данных.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
