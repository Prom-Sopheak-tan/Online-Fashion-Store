@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold text-primary-pink mb-4">📞 Contact Us</h3>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                ព័ត៌មានទំនាក់ទំនងហាង **Wedsile Store**៖
                <p class="mt-3">📍 ទីតាំង៖ បុរីលេងណាវ៉ាត្រា គម្រោង 5, រាជធានីភ្នំពេញ</p>
                <p>☎️ លេខទូរសព្ទ៖ +855 (0) 714 795 412</p>
                <p>📧 អ៊ីមែល៖ promsopheak952004@gmail.com</p>
                <p>💬 Telegram Admin: <a href="https://t.me/prom_sopheak" target="_blank" class="text-decoration-none text-primary-pink">@prom_sopheak</a></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label">ឈ្មោះរបស់អ្នក</label>
                        <input type="text" class="form-control" placeholder="បញ្ចូលឈ្មោះ...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">សាររបស់អ្នក</label>
                        <textarea class="form-control" rows="4" placeholder="តើអ្នកចង់ឱ្យពួកយើងជួយអ្វីខ្លះ?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary-pink w-100">បញ្ជូនសារ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection