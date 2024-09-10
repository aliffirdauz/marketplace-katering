<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // buatkan dua user dengan email dan password dan role merchant
        $users = [
            [
                'email' => 'sederhana@gmail.com',
                'password' => hash::make('password'),
                'role' => 'merchant',
            ],
            [
                'email' => 'enak@gmail.com',
                'password' => hash::make('password'),
                'role' => 'merchant',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
