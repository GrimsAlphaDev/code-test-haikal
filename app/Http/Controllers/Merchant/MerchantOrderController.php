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

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if($request->status_id == 2){
            // create invoice
            $this->invoice($id);
        }   

        $order->status_id = $request->status_id;
        $order->save();

        return redirect()->route('merchant.order')->with('success', 'Order status updated successfully');
    }

    // create pdf invoice
    public function invoice($id)
    {
        $order = Order::with(['customer', 'menus'])->findOrFail($id);

        // Hitung total harga
        $totalPrice = $order->menus->sum(function ($menu) {
            return $menu->price * $menu->pivot->quantity;
        });

        // Generate PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf', [
            'order' => $order,
            'totalPrice' => $totalPrice
        ]);

        // convert pdf to base64
        $pdf_base64 = base64_encode($pdf->output());
        // save pdf to order
        $order->invoice = $pdf_base64;
        $order->save();
    }

    public function viewInvoice($id)
    {
        $order = Order::find($id);

        // view invoice
        // decode base64 to pdf
        $pdf = base64_decode($order->invoice);
        return response($pdf)
            ->header('Content-Type', 'application/pdf');
    }
}
