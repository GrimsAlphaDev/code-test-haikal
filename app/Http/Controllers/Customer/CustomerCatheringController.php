<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;

class CustomerCatheringController extends Controller
{
    public function index()
    {

        $user = auth()->guard('customer')->user();
        if($user->phone == '' || $user->city == '' || $user->address == ''){
            return redirect()->route('customer.profile')->with('info', 'Please complete your profile');
        }

        $catherings = Merchant::all();
        $foodTypes = $catherings->pluck('food_type')->unique();
        $cities = $catherings->pluck('city')->unique();


        return view('customer.cathering.index', compact('catherings', 'foodTypes', 'cities'));
    }

    public function show($id)
    {
        $menus = Menu::where('merchant_id', $id)->get();
        return view('customer.cathering.show', compact('menus'));
    }
}
