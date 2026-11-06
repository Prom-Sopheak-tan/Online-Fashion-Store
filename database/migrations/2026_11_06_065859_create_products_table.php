<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('category_slug'); // ភ្ជាប់ជាមួយ Category Slug សម្រាប់ Filter ក្នុង Controller
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->json('images'); // Image Gallery ជា JSON
            $table->json('sizes');  // Sizes (S, M, L, XL) ជា JSON
            $table->json('colors'); // Colors ជា JSON
            $table->integer('stock_quantity')->default(0);
            $table->string('brand')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};