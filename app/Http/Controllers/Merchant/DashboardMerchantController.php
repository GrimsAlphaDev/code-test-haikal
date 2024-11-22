<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardMerchantController extends Controller
{
    public function index()
    {

        $user = auth()->guard('merchant')->user();
        if($user->food_type == '' || $user->address == '' || $user->city == '' || $user->contact == ''){
            return redirect()->route('merchant.profile')->with('info', 'Please complete your profile');
        }

        $orderData = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total_orders')
            ->where('status_id', 3)
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $orderCancel = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total_orders')
            ->where('status_id', 4)
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $countOrder = Order::selectRaw('COUNT(*) as total_orders')
            ->where('status_id', 1)
            ->whereYear('created_at', now()->year)
            ->first();

        $countCanceled = Order::selectRaw('COUNT(*) as total_orders')
            ->where('status_id', 4)
            ->whereYear('created_at', now()->year)
            ->first();

        $countProcessed = Order::selectRaw('COUNT(*) as total_orders')
            ->where('status_id', 2)
            ->whereYear('created_at', now()->year)
            ->first();

        $countCompleted = Order::selectRaw('COUNT(*) as total_orders')
            ->where('status_id', 3)
            ->whereYear('created_at', now()->year)
            ->first();
        

        $orderCounts = array_fill(0, 12, 0);
        $cancelCounts = array_fill(0, 12, 0);

        foreach ($orderData as $data) {
            $orderCounts[$data->month - 1] = $data->total_orders;
        }

        foreach ($orderCancel as $data) {
            $cancelCounts[$data->month - 1] = $data->total_orders;
        }

        $monthNames = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return view('merchant.dashboard.index', [
            'monthNames' => $monthNames,
            'orderCounts' => $orderCounts,
            'cancelCounts' => $cancelCounts,
            'countOrder' => $countOrder,
            'countCanceled' => $countCanceled,
            'countProcessed' => $countProcessed,
            'countCompleted' => $countCompleted
        ]);
    }
}
