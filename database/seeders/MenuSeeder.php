<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buatkan menu paketan catering dengan kategori lauk ayam, ikan, dan daging
        $menus = [
            [
                'name' => 'Paket Ayam Bakar',
                'description' => 'Paket Ayam Bakar + Nasi + Sambal + Lalapan + Es Teh',
                'price' => 25000,
                'image' => 'ayam-bakar.jpg',
                'category' => 'Lauk Ayam',
                'stock' => 100,
                'merchant_id' => 1,
            ],
            [
                'name' => 'Paket Ikan Bakar',
                'description' => 'Paket Ikan Bakar + Nasi + Sambal + Lalapan + Es Teh',
                'price' => 30000,
                'image' => 'ikan-bakar.jpeg',
                'category' => 'Lauk Ikan',
                'stock' => 100,
                'merchant_id' => 1,
            ],
            [
                'name' => 'Paket Daging Bakar',
                'description' => 'Paket Daging Bakar + Nasi + Sambal + Lalapan + Es Teh',
                'price' => 35000,
                'image' => 'daging-bakar.jpg',
                'category' => 'Lauk Daging',
                'stock' => 100,
                'merchant_id' => 1,
            ],
            [
                'name' => 'Paket Ayam Goreng',
                'description' => 'Paket Ayam Goreng + Nasi + Sambal + Lalapan + Es Jeruk',
                'price' => 25000,
                'image' => 'ayam-goreng.jpg',
                'category' => 'Lauk Ayam',
                'stock' => 100,
                'merchant_id' => 2,
            ],
            [
                'name' => 'Paket Ikan Goreng',
                'description' => 'Paket Ikan Goreng + Nasi + Sambal + Lalapan + Es Jeruk',
                'price' => 30000,
                'image' => 'ikan-goreng.jpg',
                'category' => 'Lauk Ikan',
                'stock' => 100,
                'merchant_id' => 2,
            ],
            [
                'name' => 'Paket Rendang',
                'description' => 'Paket Rendang + Nasi + Sambal + Lalapan + Es Jeruk',
                'price' => 35000,
                'image' => 'daging-goreng.jpg',
                'category' => 'Lauk Daging',
                'stock' => 100,
                'merchant_id' => 2,
            ],
        ];

        foreach ($menus as $menu) {
            \App\Models\Menu::create($menu);
        }

    }
}
