@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary-pink">🔐 Login to Wedsile</h3>
                    <p class="text-muted small">សូមបញ្ចូលអ៊ីមែល និងពាក្យសម្ងាត់របស់អ្នកដើម្បីចូលគណនី</p>
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

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">អ៊ីមែល (Email Address)</label>
                        <input type="email" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="example@email.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">ពាក្យសម្ងាត់ (Password)</label>
                        <input type="password" class="form-control rounded-pill px-3 py-2 bg-light border-0" id="password" name="password" required placeholder="••••••••">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-muted small" for="remember">
                                ចងចាំខ្ញុំ (Remember Me)
                            </label>
                        </div>
                        <a href="#" class="text-primary-pink small text-decoration-none">ភ្លេចពាក្យសម្ងាត់?</a>
                    </div>

                    <button type="submit" class="btn btn-primary-pink w-100 rounded-pill py-3 fw-bold shadow-sm mb-3">
                        ចូលគណនី (Login)
                    </button>

                    <div class="text-center">
                        <small class="text-muted">មិនទាន់មានគណនីមែនទេ? <a href="{{ route('register') }}" class="text-primary-pink text-decoration-none fw-semibold">ចុះឈ្មោះទីនេះ</a></small>
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