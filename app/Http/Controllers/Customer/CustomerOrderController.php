<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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

    public function create()
    {
        $merchants = Merchant::all();
        $menus = Menu::all();
        return view('customer.order.create', compact('merchants', 'menus'));
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

    public function pay($id)
    {
        $order = Order::find($id);
        $order->status_id = 2;
        $order->save();

        $this->invoice($id);

        return redirect()->route('customer.order')->with('success', 'Order paid successfully');
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
}
