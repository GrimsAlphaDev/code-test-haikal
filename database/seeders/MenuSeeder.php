<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Menu::create([
            'merchant_id' => 1,
            'name' => 'Nasi Goreng',
            'price' => 15000,
            'description' => 'Nasi goreng dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 1,
            'name' => 'Mie Goreng',
            'price' => 15000,
            'description' => 'Mie goreng dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 2,
            'name' => 'Nasi Ayam',
            'price' => 20000,
            'description' => 'Nasi ayam dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 2,
            'name' => 'Mie Ayam',
            'price' => 20000,
            'description' => 'Mie ayam dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 2,
            'name' => 'Nasi Uduk',
            'price' => 20000,
            'description' => 'Nasi uduk dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 2,
            'name' => 'Mie Tektek',
            'price' => 20000,
            'description' => 'Mie uduk dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 2,
            'name' => 'Nasi Kuning',
            'price' => 20000,
            'description' => 'Nasi kuning dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);

        Menu::create([
            'merchant_id' => 1,
            'name' => 'Kwetiau',
            'price' => 20000,
            'description' => 'Kwetiau dengan bumbu yang pas.',
            'photo' => 'images/defaultFood.png'
        ]);
    }
}
