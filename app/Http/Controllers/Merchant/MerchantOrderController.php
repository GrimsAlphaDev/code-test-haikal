<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
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
}
