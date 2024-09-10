<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buatkan dua merchant dengan user_id 1 dan 2
        $merchants = [
            [
                'user_id' => 1,
                'name' => 'Warung Makan Sederhana',
                'description' => 'Warung makan sederhana yang menyediakan berbagai macam menu makanan',
                'address' => 'Jl. Raya No. 1 Bandung',
                'phone' => '08123456789',
                'logo' => '1.png',
            ],
            [
                'user_id' => 2,
                'name' => 'Warung Makan Enak',
                'description' => 'Warung makan enak yang menyediakan berbagai macam menu makanan',
                'address' => 'Jl. Raya No. 2 Jakarta',
                'phone' => '08123456788',
                'logo' => '2.png',
            ],
        ];

        foreach ($merchants as $merchant) {
            \App\Models\Merchant::create($merchant);
        }
    }
}
