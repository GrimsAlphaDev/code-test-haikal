<?php

namespace Database\Seeders;

use App\Models\OrderStatus as ModelsOrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsOrderStatus::create(['name' => 'Dipesan']);
        ModelsOrderStatus::create(['name' => 'Diproses']);
        ModelsOrderStatus::create(['name' => 'Dikirim']);
        ModelsOrderStatus::create(['name' => 'Selesai']);
        ModelsOrderStatus::create(['name' => 'Dibatalkan']);
    }
}
