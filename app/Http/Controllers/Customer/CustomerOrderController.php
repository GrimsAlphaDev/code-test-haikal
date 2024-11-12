<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        return view('customer.order.index');
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
}
