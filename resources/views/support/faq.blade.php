@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold text-primary-pink mb-4">❓ Frequently Asked Questions (FAQ)</h3>
    
    <div class="accordion shadow-sm border-0" id="faqAccordion">
        <div class="accordion-item border-0 mb-3 rounded shadow-sm">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    តើខ្ញុំអាចទូទាត់ប្រាក់តាមរបៀបណាខ្លះ?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    អ្នកអាចទូទាត់ប្រាក់បានតាមរយៈការស្កែន **ABA KHQR** (Local Payment) ឬជ្រើសរើសបង់ប្រាក់ពេលទទួលបានទំនិញផ្ទាល់ (**Cash on Delivery** ផងដែរ)។
                </div>
            </div>
        </div>

        <div class="accordion-item border-0 mb-3 rounded shadow-sm">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    តើការដឹកជញ្ជូនចំណាយពេលប៉ុន្មានថ្ងៃ?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    សម្រាប់រាជធានីភ្នំពេញ ការដឹកជញ្ជូនចំណាយពេលប្រហែល ១ ទៅ ២ថ្ងៃ ឯខេត្តក្រុងផ្សេងៗចំណាយពេល ២ ទៅ ៣ថ្ងៃ។
                </div>
            </div>
        </div>

        <div class="accordion-item border-0 mb-3 rounded shadow-sm">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    តើខ្ញុំអាចដូរទំនិញវិញបានទេ ប្រសិនបើខុសទំហំ (Size)?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    បាន! អ្នកអាចទំនាក់ទំនងមកកាន់ Admin របស់យើងផ្ទាល់តាមរយៈ Telegram: <a href="https://t.me/prom_sopheak" target="_blank" class="text-primary-pink fw-bold">@prom_sopheak</a> ក្នុងរយៈពេល ៣ថ្ងៃក្រោយទទួលបានទំនិញ។
                </div>
            </div>
        </div>
    </div>
</div>
@endsection