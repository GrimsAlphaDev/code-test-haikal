<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'company_name',
        'address',
        'food_type',
        'contact',
        'description',
        'city',
        'email',
        'password',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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
