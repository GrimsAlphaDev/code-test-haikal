<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {

        // get all the cart if status is pending
        $carts = Cart::where('customer_id', auth()->guard('customer')->user()->id)
            ->where('status', 'pending')
            ->get();

        // get the total price
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->price;
        }

        return view('customer.cart.index', compact('carts', 'totalPrice'));
    }

    public function addToCart(Request $request, $id_menu)
    {

        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
            'merchant_id' => 'required',
        ]);

        // if user select different merchant return error

        $merchant = Cart::where('customer_id', auth()->guard('customer')->user()->id)
            ->where('status', 'pending')
            ->first();

        if ($merchant) {
            if ($merchant->merchant_id != $request->merchant_id) {
                return redirect()->route('customer.cathering.show', $request->merchant_id)->with('error', 'You have pending cart from different merchant, please complete your cart or cancel it');
            }
        }


        $cart = Cart::where('merchant_id', $request->merchant_id)
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->where('menu_id', $id_menu)
            ->where('status', 'pending')
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->price += $request->price;
            $cart->save();

            return redirect()->route('customer.cathering.show', $request->merchant_id)->with('success', 'Menu added to cart');
        } else {
            Cart::create([
                'customer_id' => auth()->guard('customer')->user()->id,
                'merchant_id' => $request->merchant_id,
                'menu_id' => $id_menu,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'status' => 'pending',
            ]);
            return redirect()->route(
                'customer.cathering.show',
                $request->merchant_id
            )->with('success', 'New Menu added to cart');
        }
    }


    public function getCart()
    {
        $carts = Cart::where('customer_id', auth()->guard('customer')->user()->id)
            ->where('status', 'pending')
            ->get();

        // join with menu table to get the menu name via javascript
        $carts->load('menu');

        if ($carts->count() > 0) {
            return response()->json([
                'success' => true,
                'carts' => $carts,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty',
                'cart' => [],
            ]);
        }
    }

    public function modifyQuantity(Request $request, $id)
    {
        $request->validate([
            'selector' => 'required',
        ]);

        if ($request->selector == 'plus') {
            $cart = Cart::find($id);
            $cart->quantity += 1;
            $cart->price += $cart->menu->price;
            $cart->save();
        } else {
            $cart = Cart::find($id);
            
            if ($cart->quantity <= 1) {
                $cart->delete();
                return response()->json([
                    'success' => true,
                ]);
            }

            $cart->quantity -= 1;
            $cart->price -= $cart->menu->price;
            $cart->save();
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function clearCart()
    {
        $carts = Cart::where('customer_id', auth()->guard('customer')->user()->id)
            ->where('status', 'pending')
            ->get();

        foreach ($carts as $cart) {
            $cart->delete();
        }

        return redirect()->route('customer.cart')->with('success', 'Cart cleared');
    }

    public function removeItem($id)
    {
        try {
            $cart = Cart::find($id);
            $cart->delete();
            // return json
            return response()->json([
                'success' => true,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
