<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'category_slug', 'name', 'slug', 'description', 
        'price', 'images', 'sizes', 'colors', 'stock_quantity', 'brand'
    ];

    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}