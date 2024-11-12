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
        'payment_proof',
        'total_price',
    ];

    // Relasi dengan tabel customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
}
