<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\OrderController;

// ----------------------------------------------------------------------
// Authentication Routes (Login & Register)
// ----------------------------------------------------------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success', 'ការចូលគណនីបានជោគជ័យ!');
    }

    return back()->withErrors([
        'email' => 'អ៊ីមែល ឬពាក្យសម្ងាត់មិនត្រឹមត្រូវ។',
    ])->onlyInput('email');
});

// សម្រាប់បង្ហាញទំព័រ Register (GET)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// សម្រាប់ទទួលទិន្នន័យបង្កើតគណនីថ្មី (POST)
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect()->route('home')->with('success', 'ចុះឈ្មោះគណនីបានជោគជ័យ!');
})->name('register.store');

// I. Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// II. Products / Categories
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// III. Shopping Cart & Checkout
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');

// IV. Customer Account (តម្រូវឱ្យ Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/orders', [AccountController::class, 'orderHistory'])->name('account.orders');
    Route::get('/account/addresses', [AccountController::class, 'addresses'])->name('account.addresses');
    Route::get('/account/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');
    Route::post('/account/change-password', [AccountController::class, 'changePassword'])->name('account.password');
});

// V. Customer Support
Route::get('/support/contact', [SupportController::class, 'contact'])->name('support.contact');
Route::get('/support/faq', [SupportController::class, 'faq'])->name('support.faq');
Route::get('/support/shipping', [SupportController::class, 'shippingInfo'])->name('support.shipping');
Route::get('/support/returns', [SupportController::class, 'returnPolicy'])->name('support.returns');
Route::get('/support/size-guide', [SupportController::class, 'sizeGuide'])->name('support.sizeguide');

// VI. Order Management
Route::get('/orders/tracking/{order_number?}', [OrderController::class, 'tracking'])->name('orders.tracking');
Route::get('/orders/details/{id}', [OrderController::class, 'show'])->name('orders.details');
Route::post('/orders/cancel/{id}', [OrderController::class, 'cancel'])->name('orders.cancel');