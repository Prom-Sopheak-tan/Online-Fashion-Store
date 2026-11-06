@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <div class="card border-0 shadow-sm p-5 mx-auto" style="max-width: 500px;">
        <h3 class="fw-bold text-primary-pink mb-3">ABA KHQR Payment</h3>
        <p class="text-muted">Order Number: <strong>#{{ $order->order_number }}</strong></p>
        <h4 class="fw-bold mb-4">ទឹកប្រាក់សរុប៖ ${{ number_format($order->total_amount, 2) }}</h4>
        
        <!-- Mockup QR Code -->
        <div class="bg-light p-4 rounded mb-4 d-inline-block mx-auto border">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Wedsile-Order-{{ $order->order_number }}" alt="ABA KHQR">
        </div>
        
        <p class="small text-muted mb-4">សូមប្រើប្រាស់កម្មវិធី ABA Mobile ដើម្បីស្កែនទូទាត់ប្រាក់</p>
        
        <a href="{{ route('orders.tracking', $order->order_number) }}" class="btn btn-primary-pink w-100">បានទូទាត់រួចរាល់ (Check Status)</a>
    </div>
</div>
@endsection