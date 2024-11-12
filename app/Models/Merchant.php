<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'contact',
        'description',
        'email',
        'password',
    ];

    // Relasi dengan tabel menus
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    // Relasi dengan tabel orders (jika diperlukan)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
