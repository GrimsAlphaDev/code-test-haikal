<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function signIn(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'password.required' => 'Password is required'
            ]
        );

        // check email
        $merchant = Merchant::where('email', $request->email)->first();
        if ($merchant && Hash::check($request->password, $merchant->password)) {
            // Login dengan guard merchant
            Auth::guard('merchant')->login($merchant);

            // Regenerasi session
            $request->session()->regenerate();

            return redirect()->route('merchant.menu')->with('success', 'Login successful');
        }

        $customer = Customer::where('email', $request->email)->first();
        if ($customer && Hash::check($request->password, $customer->password)) {
            // Login dengan guard merchant
            Auth::guard('customer')->login($customer);
            // Regenerasi session
            $request->session()->regenerate();

            return redirect()->route('customer.cathering')->with('success', 'Login successful');
        }


        return back()->withInput()->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signUp(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:merchants|unique:customers',
                'password' => 'required|min:6',
                'user_type' => 'required'
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'email.unique' => 'Email is already taken',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 6 characters',
                'user_type.required' => 'User type is required'
            ]
        );

        if ($request->user_type == 'customer') {
            $data = [
                'company_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $saved = Customer::create($data);
        } else if ($request->user_type == 'merchant') {
            $data = [
                'company_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $saved = Merchant::create($data);
        } else {
            return back()->withInput()->with('error', 'Invalid user type');
        }

        // logged in
        Auth::login($saved);

        if ($request->user_type == 'customer') {
            return redirect()->route('customer.dashboard')->with('success', 'Registration successful');
        } else if ($request->user_type == 'merchant') {
            return redirect()->route('merchant.dashboard')->with('success', 'Registration successful');
        }
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('merchant')->logout();
        Auth::guard('customer')->logout();
        return redirect()->route('login');
    }
}
