@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Step 5 Cart -->
    <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
        <div>
            <h2 class="fw-bold text-primary-pink mb-1">🛒 Shopping Cart</h2>
            <p class="text-muted mb-0">ពិនិត្យមើលទំនិញ និងចំនួនទឹកប្រាក់សរុបមុនពេលបន្តទៅទូទាត់ប្រាក់</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4 mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                @php
                    $cart = session()->get('cart', []);
                    $total = 0;
                @endphp

                @if(count($cart) > 0)
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ផលិតផល</th>
                                    <th>តម្លៃ</th>
                                    <th>ចំនួន</th>
                                    <th>សរុប</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $id => $details)
                                    @php 
                                        $price = $details['price'] ?? 0;
                                        $quantity = $details['quantity'] ?? $details['qty'] ?? 1;
                                        $subtotal = $price * $quantity;
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
 <td>
    <div class="d-flex align-items-center gap-3">
       <!-- កំណត់ទំហំថេរ 60px និងប្រើ !important ដើម្បីទប់ស្កាត់ Bootstrap CSS -->
        <div style="width: 60px !important; height: 60px !important; min-width: 60px !important; max-width: 60px !important; flex-shrink: 0 !important; overflow: hidden;" class="rounded-3 bg-light shadow-sm d-flex align-items-center justify-content-center">
            <img src="{{ $details['image'] ?? $details['images'] ?? 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=200&auto=format&fit=crop&q=80' }}" 
                 alt="{{ $details['name'] ?? 'Product' }}" 
                 style="width: 60px !important; height: 60px !important; object-fit: cover !important;">
        </div>
        <div>
            <h6 class="fw-bold text-dark mb-0">{{ $details['name'] ?? 'Product Name' }}</h6>
            <small class="text-muted">Size: {{ $details['size'] ?? 'M' }} | Color: {{ $details['color'] ?? 'Pink' }}</small>
        </div>
    </div>
</td>
                                        <td class="fw-semibold">${{ number_format($price, 2) }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark border px-3 py-2 fs-6">{{ $quantity }}</span>
                                        </td>
                                        <td class="fw-bold text-primary-pink">${{ number_format($subtotal, 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1">
                                                    លុប
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="fs-1 mb-3">🛒</div>
                        <h5 class="fw-bold text-dark">កន្ត្រកទំនិញរបស់អ្នកទទេរ</h5>
                        <p class="text-muted mb-4">សូមជ្រើសរើសទំនិញដែលអ្នកពេញចិត្តបន្ថែមចូលក្នុងកន្ត្រក។</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary-pink rounded-pill px-4">ទិញទំនិញឥឡូវនេះ</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Order Summary & Checkout Button (Step 5) -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h4 class="fw-bold text-dark mb-3">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2 text-muted">
                    <span>សរុប (Subtotal)</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3 text-muted">
                    <span>សេវាដឹកជញ្ជូន</span>
                    <span>Free</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4 fs-5 fw-bold text-dark">
                    <span>ទឹកប្រាក់សរុប (Total)</span>
                    <span class="text-primary-pink">${{ number_format($total, 2) }}</span>
                </div>

                <a href="{{ route('checkout.index') ?? '#' }}" class="btn btn-primary-pink w-100 rounded-pill py-3 fw-bold shadow-sm">
                    ទៅកាន់ការទូទាត់ប្រាក់ (Checkout)
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-pink { background-color: #C84B68 !important; color: white !important; }
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }
</style>
@endsection