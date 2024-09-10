<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            'user_id' => 3,
            'name' => 'Dummy Tech',
            'address' => 'Jl. Dummy No. 123',
            'phone' => '081234567890',
        ];

        \App\Models\Customer::create($customers);
    }
}
