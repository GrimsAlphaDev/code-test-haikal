<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuMerchantController extends Controller
{
    public function index()
    {
        $user = auth()->guard('merchant')->user();
        $menus = Menu::where('merchant_id', $user->id)->paginate(8);

        return view('merchant.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('merchant.menu.create');
    }

    public function store(Request $request)
    {
        // delete rp and space from price
        $sanitizePrice = str_replace('Rp', '', $request->price);
        $sanitizePrice = str_replace(' ', '', $sanitizePrice);
        // remove all dots from price
        $sanitizePrice = str_replace('.', '', $sanitizePrice);
        // convert price to integer
        $request->merge([
            'price' => (int) $sanitizePrice
        ]);

        $request->merge([
            'price' => (int) str_replace('.', '', $request->price)
        ]);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'photo' => $imageName,
            'merchant_id' => auth()->guard('merchant')->user()->id,
        ]);

        return redirect()->route('merchant.menu')->with('success', 'Menu created successfully');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('merchant.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        // if jika ada rp dan space di price
        if (strpos($request->price, 'Rp') !== false && strpos($request->price, ' ') !== false) {
            // delete rp and space from price
            $sanitizePrice = str_replace('Rp', '', $request->price);
            $sanitizePrice = str_replace(' ', '', $sanitizePrice);
            // remove all dots from price
            $sanitizePrice = str_replace('.', '', $sanitizePrice);
            // convert price to integer
            $request->merge([
                'price' => (int) $sanitizePrice
            ]);
        } else {
            // remove all dots and number after dots    
            $sanitizePrice = explode('.', $request->price);
            $sanitizePrice = $sanitizePrice[0];
            // convert price to integer
            $request->merge([
                'price' => (int) $sanitizePrice
            ]);
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('photo')) {

            $oldPhoto = public_path('images') . '/' . $menu->photo;
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }


            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $menu->photo = $imageName;
        }


        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->save();

        return redirect()->route('merchant.menu')->with('success', 'Menu updated successfully');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $oldPhoto = public_path('images') . '/' . $menu->photo;
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }
        $menu->delete();

        return redirect()->route('merchant.menu')->with('success', 'Menu deleted successfully');
    }
}
