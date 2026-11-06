@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <h2 class="fw-bold text-primary-pink mb-1">🛍️ All Products</h2>
            <p class="text-muted mb-0">ស្វែងរកម៉ូដសម្លៀកបំពាក់ទាន់សម័យ និងពេញនិយមបំផុតនៅទីនេះ</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Categories & Search Sidebar -->
        <div class="col-lg-3">
            <!-- Search Box -->
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control border-light bg-light rounded-start-pill px-3 py-2" placeholder="ស្វែងរកផលិតផល...">
                        <button class="btn btn-primary-pink rounded-end-pill px-3" type="submit">🔍</button>
                    </div>
                </form>
            </div>

            <!-- Categories -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="fw-bold text-dark mb-3">📂 Categories</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <a href="{{ route('products.index') }}" class="text-decoration-none d-block py-2 px-3 rounded-3 {{ !request('category') && !request('search') ? 'bg-pink text-white fw-bold' : 'text-dark' }}">
                            ✨ All Products
                        </a>
                    </li>
                    @foreach($categories ?? [] as $category)
                        <li class="mb-2">
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none d-block py-2 px-3 rounded-3 {{ request('category') == $category->slug ? 'bg-pink text-white fw-bold' : 'text-muted' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden product-card transition">
                            <!-- Product Image -->
                            <div class="position-relative bg-light" style="height: 240px; overflow: hidden;">
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
                        <div class="card border-0 shadow-sm rounded-4 text-center py-5 bg-white">
                            <div class="card-body">
                                <div class="fs-1 mb-3">🔍</div>
                                <h5 class="fw-bold text-dark">រកមិនឃើញផលិតផលដែលអ្នកចង់បានទេ</h5>
                                <p class="text-muted mb-4">សូមព្យាយាមស្វែងរកពាក្យគន្លឹះផ្សេង ឬជ្រើសរើសប្រភេទផលិតផលផ្សេងទៀត។</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary-pink rounded-pill px-4">មើលផលិតផលទាំងអស់</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .bg-pink { background-color: #C84B68 !important; color: white !important; }
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }
    .product-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>
@endsection