<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'name',
        'description',
        'price',
        'photo',
    ];

    // Relasi dengan tabel merchants
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Relasi dengan tabel order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
