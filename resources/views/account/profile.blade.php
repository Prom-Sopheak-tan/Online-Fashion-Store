@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header Title -->
            <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
                <div>
                    <h2 class="fw-bold text-primary-pink mb-1">👤 Profile Management</h2>
                    <p class="text-muted mb-0">គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន និងសុវត្ថិភាពគណនីរបស់អ្នក</p>
                </div>
            </div>

            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success rounded-4 mb-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger rounded-4 mb-4 shadow-sm">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <form action="{{ route('account.password') }}" method="POST">
                    @csrf
                    
                    <h4 class="fw-bold text-dark mb-4">ព័ត៌មានគណនី (Account Info)</h4>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ឈ្មោះពេញ (Full Name)</label>
                        <input type="text" class="form-control rounded-pill px-3 py-2 bg-light border-0" value="{{ auth()->user()->name ?? '' }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">អ៊ីមែល (Email Address)</label>
                        <input type="email" class="form-control rounded-pill px-3 py-2 bg-light border-0" value="{{ auth()->user()->email ?? '' }}" readonly>
                    </div>

                    <hr class="my-4">

                    <h4 class="fw-bold text-dark mb-4">🔒 ផ្លាស់ប្តូរពាក្យសម្ងាត់ (Change Password)</h4>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ពាក្យសម្ងាត់បច្ចុប្បន្ន (Current Password)</label>
                        <input type="password" name="current_password" class="form-control rounded-pill px-3 py-2 bg-light border-0" placeholder="••••••••" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ពាក្យសម្ងាត់ថ្មី (New Password)</label>
                        <input type="password" name="new_password" class="form-control rounded-pill px-3 py-2 bg-light border-0" placeholder="••••••••" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">បញ្ជាក់ពាក្យសម្ងាត់ថ្មី (Confirm New Password)</label>
                        <input type="password" name="new_password_confirmation" class="form-control rounded-pill px-3 py-2 bg-light border-0" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary-pink rounded-pill px-4 py-2 fw-bold shadow-sm">
                        ធ្វើបច្ចុប្បន្នភាពពាក្យសម្ងាត់
                    </button>
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