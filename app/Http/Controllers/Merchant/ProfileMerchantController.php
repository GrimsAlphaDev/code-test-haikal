<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'city' => 'required',
        ]);

        $user = auth()->guard('merchant')->user();
        $merchant = Merchant::find($user->id);
        if (!$merchant) {
            return redirect()->route('merchant.profile')->with('error', 'Merchant not found');
        }
        $merchant->update([
            'company_name' => $request->company_name,
            'food_type' => $request->food_type,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
            'email' => $request->email,
            'city' => $request->city,
        ]);

        return redirect()->route('merchant.profile')->with('success', 'Profile updated successfully');
    }

    public function changeImage(Request $request)
    {
        $user = auth()->guard('merchant')->user();
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
                $merchant = Merchant::find($user->id);
                $merchant->update([
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

        $user = auth()->guard('merchant')->user();
        $merchant = Merchant::find($user->id);
        if (!$merchant) {
            return redirect()->route('merchant.profile')->with('error', 'Merchant not found');
        }
        $merchant->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('merchant.profile')->with('success', 'Password updated successfully');
    }

}
