<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class ProfileMerchantController extends Controller
{
    public function index()
    {
        $user = auth()->guard('merchant')->user();
        return view('merchant.profile.index', compact('user'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'company_name' => 'required',
            'food_type' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'email' => 'required|email',
        ]);

        $user = auth()->guard('merchant')->user();
        $merchant = Merchant::find($user->id);
        if(!$merchant){
            return redirect()->route('merchant.profile')->with('error', 'Merchant not found');
        }
        $merchant->update([
            'company_name' => $request->company_name,
            'food_type' => $request->food_type,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
            'email' => $request->email,
        ]);

        return redirect()->route('merchant.profile')->with('success', 'Profile updated successfully');
    }
}
