<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $order1 = Order::create([
            'customer_id' => 1,
            'status_id' => 1,
            'delivery_date' => '2024-11-12',
            'payment_proof' => 'images/defaultFood.png',
            'total_price' => 15000
        ]);

        $order1Item1 = $order1->orderItems()->create([
            'order_id' => $order1->id,
            'menu_id' => 1,
            'quantity' => 1,
            'price' => 15000
        ]);

        $order1Item2 = $order1->orderItems()->create([
            'order_id' => $order1->id,
            'menu_id' => 2,
            'quantity' => 2,
            'price' => 30000
        ]);

        $order2 = Order::create([
            'customer_id' => 2,
            'status_id' => 2,
            'delivery_date' => '2024-11-12',
            'payment_proof' => 'images/defaultFood.png',
            'total_price' => 20000
        ]);

        $order2Item1 = $order2->orderItems()->create([
            'order_id' => $order2->id,
            'menu_id' => 3,
            'quantity' => 1,
            'price' => 20000
        ]);

        $order2Item2 = $order2->orderItems()->create([
            'order_id' => $order2->id,
            'menu_id' => 4,
            'quantity' => 2,
            'price' => 40000
        ]);

    }
}
