<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merchant::create([
            'company_name' => 'Katering Lezat',
            'email' => 'kat@gmail.com',
            'food_type' => 'Indonesia',
            'password' => bcrypt('asdasd'),
            'address' => 'Jl. Makanan No. 1, Jakarta',
            'city' => 'Jakarta',
            'contact' => '081234567890',
            'description' => 'Katering dengan berbagai pilihan menu lezat.'
        ]);

        Merchant::create([
            'company_name' => 'Katering Sehat',
            'email' => 'sehat@gmail.com',
            'food_type' => 'Sehat',
            'password' => bcrypt('asdasd'),
            'address' => 'Jl. Sehat No. 2, Jakarta',
            'city' => 'Bandung',
            'contact' => '081234567891',
            'description' => 'Katering sehat untuk gaya hidup seimbang.'
        ]);

    }
}
