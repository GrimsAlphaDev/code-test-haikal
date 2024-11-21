<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class MerchantOrderController extends Controller
{
    public function index()
    {

        $orders = Order::where('merchant_id', auth()->guard('merchant')->user()->id)->paginate(8);

        return view('merchant.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $totalPrice = 0;

        return view('merchant.order.show', compact('order', 'totalPrice'));
    }

    public function view($id)
    {
        $order = Order::find($id);

        // view invoice
        // decode base64 to pdf
        $pdf = base64_decode($order->invoice);
        return response($pdf)
            ->header('Content-Type', 'application/pdf');
            
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        // cart item status to canceled
        foreach ($order->menus as $menu) {
            $cart = Cart::where('menu_id', $menu->id)->where('status', 'completed')->first();
            $cart->status = 'canceled';
            $cart->save();
        }

        $order->status_id = 4;
        $order->save();

        return redirect()->route('merchant.order')->with('success', 'Order canceled successfully');
    }
}
