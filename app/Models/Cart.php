<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'customer_id',
        'menu_id',
        'quantity',
        'price',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }


}
