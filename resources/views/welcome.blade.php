@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Hero Banner (Step 1 Home Flow with Image) -->
    <div class="p-5 mb-5 rounded-4 text-white shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #C84B68 0%, #e06d88 100%);">
        <div class="row align-items-center">
            <div class="col-md-7 z-index-2">
                <h1 class="display-5 fw-bold mb-3">Wedsile Online Fashion Store</h1>
                <p class="lead mb-4">ហាងលក់សម្លៀកបំពាក់ទាន់សម័យ ជាមួយម៉ូដថ្មីៗ និងគុណភាពខ្ពស់ ព្រមទាំងពណ៌ផ្កាឈូកដ៏ស្រស់ស្អាត។</p>
                <a href="{{ route('products.index') }}" class="btn btn-light text-primary-pink fw-bold px-4 py-2 rounded-pill shadow-sm">
                    ✨ ទិញទំនិញឥឡូវនេះ (Shop Now)
                </a>
            </div>
            <div class="col-md-5 text-center d-none d-md-block">
                <div class="position-relative rounded-4 overflow-hidden shadow" style="height: 250px;">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600&auto=format&fit=crop&q=80" 
                         alt="Wedsile Fashion Banner" 
                         class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Search Bar Section -->
    <div class="mb-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-10">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-light border-0 rounded-start-pill ps-4 text-muted">🔍</span>
                        <input type="text" name="search" class="form-control bg-light border-0 py-3 fs-6" placeholder="ស្វែងរកម៉ូដសម្លៀកបំពាក់ដែលអ្នកពេញចិត្ត...">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary-pink btn-lg w-100 rounded-pill py-3 fw-bold shadow-sm fs-6">ស្វែងរក</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Shop by Categories as Icons -->
    <div class="mb-5">
        <h3 class="fw-bold text-primary-pink mb-4">📂 Shop by Categories</h3>
        <div class="row g-4">
            @forelse($categories ?? [] as $category)
                <div class="col-md-4">
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm text-center p-4 bg-white rounded-4 h-100 category-card">
                            <div class="card-body">
                                <!-- Icon Circle -->
                                <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 bg-pink-light shadow-sm" style="width: 80px; height: 80px;">
                                    <span class="fs-2">
                                        @if($category->slug == 'dresses') 👗
                                        @elseif($category->slug == 'tops') 👚
                                        @else 👜
                                        @endif
                                    </span>
                                </div>
                                <h5 class="fw-bold text-dark mb-1">{{ $category->name }}</h5>
                                <span class="text-primary-pink small fw-semibold">មើលផលិតផល &rarr;</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center text-muted">មិនទាន់មាន Categories នៅឡើយទេ។</div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Latest Products -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary-pink mb-0">🔥 Latest Products</h3>
            <a href="{{ route('products.index') }}" class="text-decoration-none text-muted fw-semibold">មើលទាំងអស់ &rarr;</a>
        </div>

        <div class="row g-4">
            @forelse($products ?? [] as $product)
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden product-card">
                        <!-- Product Image -->
                        <div class="position-relative bg-light" style="height: 220px; overflow: hidden;">
                            <img src="{{ $product->images ?? 'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=500&auto=format&fit=crop&q=60' }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-100 h-100 object-fit-cover">
                            <span class="position-absolute top-0 end-0 m-3 badge bg-pink shadow-sm">New</span>
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h6 class="fw-bold text-dark mb-1 text-truncate">{{ $product->name }}</h6>
                            <p class="text-primary-pink fw-bold fs-5 mb-3">${{ number_format($product->price, 2) }}</p>
                            
                            <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-secondary btn-sm w-50 rounded-pill py-2">លម្អិត</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-50">
                                    @csrf
                                    <button type="submit" class="btn btn-primary-pink btn-sm w-100 rounded-pill py-2">🛒 ទិញ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-4">មិនទាន់មានផលិតផលបានដាក់បង្ហាញនៅឡើយទេ។</div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .bg-pink { background-color: #C84B68 !important; color: white !important; }
    .bg-pink-light { background-color: #fdf2f4 !important; }
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }
    .category-card, .product-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .category-card:hover, .product-card:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>
@endsection