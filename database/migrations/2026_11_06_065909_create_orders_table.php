<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // លេខកូដកុម្ម៉ង់ (ឧ. WDS-987654)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('delivery_method')->default('Standard Delivery');
            $table->string('payment_method'); // ABA/KHQR, COD, etc.
            // ដំណាក់កាល Order Tracking Process Flow
            $table->enum('status', ['Order Placed', 'Processing', 'Shipped', 'Out for Delivery', 'Delivered'])
                  ->default('Order Placed');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};