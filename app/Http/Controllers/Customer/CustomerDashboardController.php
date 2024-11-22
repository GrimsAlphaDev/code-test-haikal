<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {

        $user = auth()->guard('customer')->user();
        // check if user profile is complete
        if($user->phone == '' || $user->city == '' || $user->address == ''){
            return redirect()->route('customer.profile')->with('info', 'Please complete your profile');
        }

        return view('customer.dashboard.index');
    }
}
