@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold text-primary-pink mb-4">💳 Checkout Information</h3>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <h5 class="fw-bold mb-3">ព័ត៌មានអតិថិជន និងការដឹកជញ្ជូន</h5>
                    <div class="mb-3">
                        <label class="form-label">ឈ្មោះពេញ (Full Name)</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">លេខទូរសព្ទ (Phone Number)</label>
                        <input type="text" name="customer_phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">អាសយដ្ឋានដឹកជញ្ជូន (Shipping Address)</label>
                        <textarea name="shipping_address" class="form-control" rows="3" required placeholder="ឧ. ផ្ទះលេខ..., ផ្លូវ..., រាជធានីភ្នំពេញ"></textarea>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">វិធីសាស្ត្រទូទាត់ប្រាក់ (Payment Method)</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" value="ABA/KHQR" id="aba" checked>
                        <label class="form-check-label fw-bold" for="aba">ABA / KHQR (Local Payment)</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" value="Cash on Delivery" id="cod">
                        <label class="form-check-label fw-bold" for="cod">បង់ប្រាក់ពេលទទួលបានទំនិញ (Cash on Delivery)</label>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">ការបញ្ជាទិញរបស់អ្នក</h5>
                    <button type="submit" class="btn btn-primary-pink w-100 btn-lg mt-3">បញ្ជាក់ការកុម្ម៉ង់ (Place Order)</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection