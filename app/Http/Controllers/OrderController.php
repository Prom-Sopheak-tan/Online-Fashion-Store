<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function tracking(Request $request, $order_number = null)
    {
        $searchNumber = $order_number ?? $request->order_number;
        $order = null;

        if ($searchNumber) {
            $order = Order::where('order_number', $searchNumber)->first();
        }

        // ស្ថានភាពតាមដានទាំង ៥ ដំណាក់កាល[cite: 28]
        $statuses = ['Order Placed', 'Processing', 'Shipped', 'Out for Delivery', 'Delivered'];

        return view('orders.tracking', compact('order', 'statuses', 'searchNumber'));
    }
}