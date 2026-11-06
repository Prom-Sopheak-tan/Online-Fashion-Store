@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Product Image (Step 3: Product Detail) -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-light" style="height: 450px;">
                <img src="{{ $product->images ?? 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=800&auto=format&fit=crop&q=80' }}" 
                     alt="{{ $product->name }}" 
                     class="w-100 h-100 object-fit-cover">
            </div>
        </div>

        <!-- Product Details, Color, Size, Quantity (Steps 3 & 4) -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <h2 class="fw-bold text-dark mb-2">{{ $product->name }}</h2>
                <h3 class="text-primary-pink fw-bold mb-3">${{ number_format($product->price, 2) }}</h3>
                
                <!-- Rating -->
                <div class="mb-3 text-warning">
                    ★★★★★ <span class="text-muted small ms-2">(124 reviews)</span>
                </div>

                <p class="text-muted mb-4">{{ $product->description ?? 'ហាងលក់សម្លៀកបំពាក់ទាន់សម័យ និងមានគុណភាពខ្ពស់សម្រាប់ឱកាសពិសេសរបស់អ្នក។' }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label class="fw-bold text-dark mb-2 d-block">Color</label>
                        <div class="d-flex gap-3">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="color" id="colorPink" value="Pink" checked>
                                <label class="form-check-label text-dark" for="colorPink">Pink</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="color" id="colorBeige" value="Beige">
                                <label class="form-check-label text-dark" for="colorBeige">Beige</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="color" id="colorBlack" value="Black">
                                <label class="form-check-label text-dark" for="colorBlack">Black</label>
                            </div>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div class="mb-4">
                        <label class="fw-bold text-dark mb-2 d-block">Size</label>
                        <div class="d-flex gap-2">
                            @foreach(['S', 'M', 'L', 'XL'] as $size)
                                <input type="radio" class="btn-check" name="size" id="size{{ $size }}" value="{{ $size }}" {{ $loop->first ? 'checked' : '' }}>
                                <label class="btn btn-outline-custom-pink rounded-pill px-3 py-1" for="size{{ $size }}">{{ $size }}</label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quantity Selector (Step 4) -->
                    <div class="mb-4">
                        <label class="fw-bold text-dark mb-2 d-block">Quantity</label>
                        <div class="input-group" style="width: 150px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="decrementQty()">-</button>
                            <input type="number" name="quantity" id="qtyInput" value="1" min="1" class="form-control text-center">
                            <button class="btn btn-outline-secondary" type="button" onclick="incrementQty()">+</button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="submit" class="btn btn-primary-pink w-100 rounded-pill py-3 fw-bold shadow-sm">
                        🛒 Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function incrementQty() {
        let input = document.getElementById('qtyInput');
        input.value = parseInt(input.value) + 1;
    }
    function decrementQty() {
        let input = document.getElementById('qtyInput');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

<style>
    .bg-pink { background-color: #C84B68 !important; color: white !important; }
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }

    /* Custom Color Radio Checked Style */
    .custom-radio .form-check-input:checked {
        background-color: #C84B68 !important;
        border-color: #C84B68 !important;
    }

    /* Custom Size Pill Checked Style */
    .btn-outline-custom-pink {
        color: #4a4a4a;
        border-color: #dee2e6;
        background-color: #fff;
    }
    .btn-check:checked + .btn-outline-custom-pink {
        background-color: #C84B68 !important;
        color: white !important;
        border-color: #C84B68 !important;
        box-shadow: 0 4px 6px rgba(200, 75, 104, 0.25);
    }
</style>
@endsection