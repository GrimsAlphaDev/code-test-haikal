<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price',
    ];

    // Relasi dengan tabel orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan tabel menus
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
