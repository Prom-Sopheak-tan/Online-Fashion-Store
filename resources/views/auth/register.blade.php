@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary-pink">📝 Register for Wedsile</h3>
                    <p class="text-muted small">សូមបំពេញព័ត៌មានខាងក្រោមដើម្បីបង្កើតគណនីថ្មី</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger rounded-3 py-2 small mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">ឈ្មោះពេញ (Full Name)</label>
                        <input type="text" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Prom Sopheak">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">អ៊ីមែល (Email Address)</label>
                        <input type="email" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="email" name="email" value="{{ old('email') }}" required placeholder="example@email.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">ពាក្យសម្ងាត់ (Password)</label>
                        <input type="password" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="password" name="password" required placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">បញ្ជាក់ពាក្យសម្ងាត់ (Confirm Password)</label>
                        <input type="password" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="password_confirmation" name="password_confirmation" required placeholder="••••••••">
                    </div>

                    <button type="submit" class="btn btn-primary-pink w-100 rounded-pill py-3 fw-bold shadow-sm mb-3">
                        ចុះឈ្មោះ (Register)
                    </button>

                    <div class="text-center">
                        <small class="text-muted">មានគណនីរួចហើយ? <a href="{{ route('login') }}" class="text-primary-pink text-decoration-none fw-semibold">ចូលគណនីទីនេះ</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }
</style>
@endsection