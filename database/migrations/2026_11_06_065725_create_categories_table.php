<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ឈ្មោះប្រភេទ (ឧ. Men's Collection, Women's Collection)
            $table->string('slug')->unique(); // Slug សម្រាប់ធ្វើជា Filter URL
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('categories');
    }
};