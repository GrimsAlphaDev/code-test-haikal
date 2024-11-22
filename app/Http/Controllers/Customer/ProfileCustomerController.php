<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileCustomerController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        return view('customer.profile.index', compact('user'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email|unique:customers,email,' . auth()->guard('customer')->user()->id,
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $user = auth()->guard('customer')->user();
        $customer = Customer::find($user->id);
        if (!$customer) {
            return redirect()->route('customer.profile')->with('error', 'Customer not found');
        }
        $customer->update([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully');
    }

    public function changeImage(Request $request)
    {
        $user = auth()->guard('customer')->user();
        // update profile photo
        if ($request->hasFile('profile_photo')) {
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $image = $request->file('profile_photo');
            $imageName = time() . '.' . $image->extension();

            // Hapus foto lama jika ada
            $oldPhoto = public_path('images/profile_image/' . $user->profile_photo);
            if (file_exists($oldPhoto) && $user->profile_photo) {
                unlink($oldPhoto);
            }

            $image->move(public_path('images/profile_image/'), $imageName);

            try {
                $customer = Customer::find($user->id);
                $customer->update([
                    'profile_photo' => $imageName,
                ]);

                $response = [
                    'success' => true,
                    'message' => 'Profile photo updated successfully',
                ];

                return response()->json($response);
            } catch (\Throwable $th) {
                $response = [
                    'success' => false,
                    'message' => 'Failed to update profile photo',
                    'error' => $th->getMessage(),
                ];

                return response()->json($response);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = auth()->guard('customer')->user();
        $customer = Customer::find($user->id);
        if (!$customer) {
            return redirect()->route('customer.profile')->with('error', 'Customer not found');
        }
        $customer->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('customer.profile')->with('success', 'Password updated successfully');
    }
}
