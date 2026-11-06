@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 p-4 mb-4">
        <h3 class="fw-bold text-primary-pink mb-3">📦 Order Status Tracking</h3>
        <form action="{{ route('orders.tracking') }}" method="GET" class="row g-3">
            <div class="col-md-9">
                <input type="text" name="order_number" class="form-control form-control-lg" 
                       placeholder="បញ្ចូលលេខ Order Number របស់អ្នក (ឧ. WDS-987654)" value="{{ $searchNumber }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary-pink btn-lg w-100">ស្វែងរក Order</button>
            </div>
        </form>
    </div>

    @if($order)
        <div class="card shadow-sm border-0 p-4">
            <h5>ព័ត៌មានការបញ្ជាទិញ: <span class="text-primary-pink">#{{ $order->order_number }}</span></h5>
            <hr>
            <!-- Timeline Process Flow[cite: 28] -->
            <div class="d-flex justify-content-between align-items-center position-relative my-4">
                @foreach($statuses as $index => $status)
                    @php
                        $currentIndex = array_search($order->status, $statuses);
                        $isPassed = $currentIndex !== false && $index <= $currentIndex;
                    @endphp
                    <div class="text-center z-1">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2 text-white fw-bold"
                             style="width: 45px; height: 45px; background-color: {{ $isPassed ? '#C84B68' : '#ccc' }};">
                            {{ $index + 1 }}
                        </div>
                        <small class="fw-bold d-block" style="color: {{ $isPassed ? '#C84B68' : '#777' }}">{{ $status }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @elseif($searchNumber)
        <div class="alert alert-warning">មិនរកឃើញព័ត៌មាន Order សម្រាប់លេខកូដនេះទេ។</div>
    @endif
</div>
@endsection