<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ជំហានទី III: Cart Page (បង្ហាញទំនិញក្នុងកន្ត្រក)
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('cart.index', compact('cart', 'subtotal'));
    }

    // បញ្ចូលទំនិញទៅក្នុងកន្ត្រក
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        
        $cartKey = $id . '_' . $request->size . '_' . $request->color;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'size' => $request->size,
                'color' => $request->color,
                'quantity' => $request->quantity,
                'image' => json_decode($product->images)[0] ?? 'default.jpg'
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'បានបញ្ចូលទំនិញទៅក្នុងកន្ត្រកដោយជោគជ័យ!');
    }

    // Update / Remove Item
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }
}