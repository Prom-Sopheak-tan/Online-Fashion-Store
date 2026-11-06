<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    // ជំហានទី III: Checkout Page
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'កន្ត្រកទំនិញរបស់អ្នកទទេរ!');
        }
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('checkout.index', compact('cart', 'subtotal'));
    }

    // Process Checkout & Payment Method Selection (ABA/KHQR or COD)
    public function process(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:Credit/Debit Card,ABA/KHQR,Cash on Delivery'
        ]);

        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'order_number' => 'WDS-' . strtoupper(Str::random(6)),
            'user_id' => auth()->id() ?? null,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'delivery_method' => 'Standard Delivery',
            'payment_method' => $request->payment_method,
            'status' => 'Order Placed',
            'total_amount' => $total,
        ]);

        session()->forget('cart');

        // ប្រសិនបើជ្រើសរើស ABA/KHQR បញ្ជូនទៅកាន់ទំព័រស្កែន QR Code
        if ($request->payment_method === 'ABA/KHQR') {
            return redirect()->route('checkout.payment', $order->id);
        }

        return redirect()->route('orders.tracking', $order->order_number)
                         ->with('success', 'ការបញ្ជាទិញបានសម្រេចជោគជ័យ!');
    }

    public function payment($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('checkout.payment', compact('order'));
    }
}