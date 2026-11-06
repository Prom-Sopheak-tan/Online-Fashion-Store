<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // បើក្នុង Database គ្មាន Category វានឹងបង្កើតស្វ័យប្រវត្តិជាមួយរូបភាព
        if (Category::count() == 0) {
            Category::create([
                'name' => 'Dresses', 
                'slug' => 'dresses',
                'image' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=500&auto=format&fit=crop&q=60'
            ]);
            Category::create([
                'name' => 'Tops & Blouses', 
                'slug' => 'tops',
                'image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500&auto=format&fit=crop&q=60'
            ]);
            Category::create([
                'name' => 'Accessories', 
                'slug' => 'accessories',
                'image' => 'https://images.unsplash.com/photo-1523293182086-7651a899d37f?w=500&auto=format&fit=crop&q=60'
            ]);
        }

        // បើក្នុង Database គ្មាន Product វានឹងបង្កើតទំនិញគំរូមានរូបភាពស្អាតៗ
        if (Product::count() == 0) {
            $dressCategory = Category::where('slug', 'dresses')->first();
            $topCategory = Category::where('slug', 'tops')->first();

            Product::create([
                'name' => 'Wedsile Rose Pink Dress',
                'slug' => 'wedsile-rose-pink-dress',
                'description' => 'Beautiful rose pink dress for special occasions.',
                'price' => 45.00,
                'stock' => 10,
                'sizes' => json_encode(['S', 'M', 'L']),
                'colors' => json_encode(['Pink', 'White']),
                'category_id' => $dressCategory->id ?? 1,
                'category_slug' => 'dresses',
                'images' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=500&auto=format&fit=crop&q=60'
            ]);

            Product::create([
                'name' => 'Elegant Classic Blouse',
                'slug' => 'elegant-classic-blouse',
                'description' => 'Classic and comfortable blouse for daily wear.',
                'price' => 25.50,
                'stock' => 15,
                'sizes' => json_encode(['S', 'M', 'XL']),
                'colors' => json_encode(['White', 'Black']),
                'category_id' => $topCategory->id ?? 1,
                'category_slug' => 'tops',
                'images' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500&auto=format&fit=crop&q=60'
            ]);

            Product::create([
                'name' => 'Modern Evening Gown',
                'slug' => 'modern-evening-gown',
                'description' => 'Stunning modern evening gown.',
                'price' => 89.00,
                'stock' => 5,
                'sizes' => json_encode(['M', 'L', 'XL']),
                'colors' => json_encode(['Red', 'Blue']),
                'category_id' => $dressCategory->id ?? 1,
                'category_slug' => 'dresses',
                'images' => 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=500&auto=format&fit=crop&q=60'
            ]);
        }

        $categories = Category::all();
        $products = Product::latest()->take(8)->get();

        return view('welcome', compact('categories', 'products'));
    }
}