<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'user_id', 'customer_name', 'customer_phone',
        'shipping_address', 'delivery_method', 'payment_method', 'status', 'total_amount'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}