<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status_id',
        'delivery_date',
        'merchant_id',
        'total_price',
        'invoice',
        'delivery_address',
    ];

    // Relasi dengan tabel customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi dengan tabel merchants
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Relasi dengan tabel order_statuses
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    // Relasi dengan tabel order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi many to many dengan tabel menus
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'order_items', 'order_id', 'menu_id')->withPivot('quantity');
    }
}
