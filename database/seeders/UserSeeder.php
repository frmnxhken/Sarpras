<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'role' => 'admin'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com', 'role' => 'user'],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com', 'role' => 'user'],
            ['name' => 'Diana Evans', 'email' => 'diana@example.com', 'role' => 'user'],
            ['name' => 'Ethan Foster', 'email' => 'ethan@example.com', 'role' => 'user'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'role' => $user['role'],
                // photo dan remember_token tidak diisi
            ]);
        }
    }
}
