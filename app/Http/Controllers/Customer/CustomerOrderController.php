<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $order = Order::where('customer_id', auth()->guard('customer')->user()->id)->get();
        return view('customer.order.index', compact('order'));
    }

    public function show($id)
    {
        $order = Order::with('menus')->findOrFail($id);
        $totalPrice = 0;
        return view('customer.order.show', compact('order', 'totalPrice'));
    }

    public function store(Request $request)
    {

        $order = new Order();
        $order->customer_id = auth()->guard('customer')->user()->id;
        $order->merchant_id = $request->order[0]['merchant_id'];
        $order->delivery_date = $request->order[0]['delivery_date'];
        $order->status_id = 1;
        $order->save();

        foreach ($request->order as $item) {
            // remove rp and space from price
            $sanitizePrice = str_replace('Rp', '', $item['price']);
            $sanitizePrice = str_replace(' ', '', $sanitizePrice);
            // convert price to integer
            $item['price'] = (int) $sanitizePrice;
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menuId'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // count total price
        $totalPrice = 0;
        foreach ($order->menus as $menu) {
            $totalPrice += $menu->price * $menu->pivot->quantity;
        }

        $order->total_price = $totalPrice;
        $order->save();

        return true;
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'delivery_date' => 'required',
            'delivery_address' => 'required',
        ]);
        
        try {
            
            // get customer cart
            $carts = Cart::where('customer_id', auth()->guard('customer')->user()->id)->where('status', 'pending')->get();
            
            // count total price
            $totalPrice = 0;
            foreach ($carts as $cart) {
                $totalPrice += $cart->menu->price * $cart->quantity;
            }
            
            
            $order = new Order();
            $order->customer_id = auth()->guard('customer')->user()->id;
            $order->status_id = 1;
            $order->merchant_id = $carts[0]->merchant_id;
            $order->delivery_date = $request->delivery_date;
            $order->delivery_address = $request->delivery_address;
            $order->total_price = $totalPrice;
            $order->save();

            
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $cart->menu_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                ]);
                $cart->status = 'completed';
                $cart->save();
            }

            // create invoice
            $this->invoice($order->id);


            return redirect()->route('customer.order')->with('success', 'Order created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('customer.cart')->with('error', 'Failed to create order');
        }
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

        return redirect()->route('customer.order')->with('success', 'Order canceled successfully');
    }

    public function viewInvoice($id)
    {
        $order = Order::find($id);
        // decode base64 to pdf
        $pdf = base64_decode($order->invoice);
        return response($pdf)
            ->header('Content-Type', 'application/pdf');
    }
}
