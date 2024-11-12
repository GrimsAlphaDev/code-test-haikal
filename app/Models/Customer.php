<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    
    protected $fillable = [
        'company_name',
        'email',
        'password',
    ];

    // Relasi dengan tabel orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
