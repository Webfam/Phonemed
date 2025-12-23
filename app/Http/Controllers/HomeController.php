<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // Get featured products from database
        $featuredProducts = Product::where('is_active', true)
                                  ->where('is_featured', true)
                                  ->take(6)
                                  ->get();
        
        // If no featured products in database, use sample data
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = collect($this->getSampleFeaturedProducts());
        }
        
        // Get flash sale products (products with compare_at_price > price)
        $flashProducts = Product::where('is_active', true)
                               ->whereNotNull('compare_at_price')
                               ->whereColumn('compare_at_price', '>', 'price')
                               ->take(6)
                               ->get();
        
        if ($flashProducts->isEmpty()) {
            $flashProducts = collect($this->getSampleFlashProducts());
        }
        
        // Get products by category from database
        $phones = Product::where('is_active', true)
                        ->where('category_id', 1) // Assuming phones category ID is 1
                        ->take(6)
                        ->get();
        
        $electronics = Product::where('is_active', true)
                             ->where('category_id', 2) // Assuming electronics category ID is 2
                             ->take(6)
                             ->get();
        
        $accessories = Product::where('is_active', true)
                             ->where('category_id', 3) // Assuming accessories category ID is 3
                             ->take(6)
                             ->get();
        
        // If no products in categories, use sample data
        if ($phones->isEmpty()) {
            $phones = collect($this->getSamplePhones());
        }
        
        if ($electronics->isEmpty()) {
            $electronics = collect($this->getSampleElectronics());
        }
        
        if ($accessories->isEmpty()) {
            $accessories = collect($this->getSampleAccessories());
        }
        
        return view('home', compact(
            'featuredProducts',
            'flashProducts',
            'phones',
            'electronics',
            'accessories'
        ));
    }

    /**
     * Sample featured products data.
     */
    private function getSampleFeaturedProducts()
    {
        return [
            (object)[
                'id' => 1,
                'name' => 'iPhone 15 Pro',
                'category_id' => 1,
                'price' => 189999.00,
                'compare_at_price' => 229999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.8
            ],
            (object)[
                'id' => 2,
                'name' => 'Samsung Galaxy S24',
                'category_id' => 1,
                'price' => 149999.00,
                'compare_at_price' => 179999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.7
            ],
            (object)[
                'id' => 3,
                'name' => 'MacBook Air M2',
                'category_id' => 2,
                'price' => 149999.00,
                'compare_at_price' => 174999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.9
            ],
            (object)[
                'id' => 4,
                'name' => 'Sony WH-1000XM5',
                'category_id' => 3,
                'price' => 34999.00,
                'compare_at_price' => 44999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.6
            ],
            (object)[
                'id' => 5,
                'name' => 'PlayStation 5',
                'category_id' => 2,
                'price' => 69999.00,
                'compare_at_price' => 79999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.8
            ],
            (object)[
                'id' => 6,
                'name' => 'Apple Watch Series 9',
                'category_id' => 3,
                'price' => 54999.00,
                'compare_at_price' => 64999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop']),
                'is_featured' => true,
                'rating' => 4.5
            ],
        ];
    }

    /**
     * Sample flash sale products data.
     */
    private function getSampleFlashProducts()
    {
        return [
            (object)[
                'id' => 7,
                'name' => 'Google Pixel 8 Pro',
                'category_id' => 1,
                'price' => 119999.00,
                'compare_at_price' => 149999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop']),
                'stock_quantity' => 58
            ],
            (object)[
                'id' => 8,
                'name' => 'Dell XPS 15',
                'category_id' => 2,
                'price' => 199999.00,
                'compare_at_price' => 249999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop']),
                'stock_quantity' => 65
            ],
            (object)[
                'id' => 9,
                'name' => 'AirPods Pro 2',
                'category_id' => 3,
                'price' => 29999.00,
                'compare_at_price' => 39999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=300&h=300&fit=crop']),
                'stock_quantity' => 22
            ],
            (object)[
                'id' => 10,
                'name' => 'Samsung 4K TV',
                'category_id' => 2,
                'price' => 79999.00,
                'compare_at_price' => 99999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=300&h=300&fit=crop']),
                'stock_quantity' => 72
            ],
            (object)[
                'id' => 11,
                'name' => 'iPad Pro 12.9"',
                'category_id' => 2,
                'price' => 124999.00,
                'compare_at_price' => 149999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=300&h=300&fit=crop']),
                'stock_quantity' => 69
            ],
            (object)[
                'id' => 12,
                'name' => 'Razer BlackWidow',
                'category_id' => 3,
                'price' => 15999.00,
                'compare_at_price' => 19999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=300&h=300&fit=crop']),
                'stock_quantity' => 54
            ],
        ];
    }

    /**
     * Sample phones data.
     */
    private function getSamplePhones()
    {
        return [
            (object)[
                'id' => 13,
                'name' => 'OnePlus 12',
                'price' => 94999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 14,
                'name' => 'Samsung Galaxy Z Flip',
                'price' => 129999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 15,
                'name' => 'iPhone 14 Plus',
                'price' => 149999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 16,
                'name' => 'Google Pixel 7a',
                'price' => 64999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 17,
                'name' => 'Xiaomi 13 Pro',
                'price' => 89999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 18,
                'name' => 'Nothing Phone 2',
                'price' => 69999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'])
            ],
        ];
    }

    /**
     * Sample electronics data.
     */
    private function getSampleElectronics()
    {
        return [
            (object)[
                'id' => 19,
                'name' => 'HP Spectre x360',
                'price' => 179999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 20,
                'name' => 'Xbox Series X',
                'price' => 74999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 21,
                'name' => 'LG OLED TV',
                'price' => 189999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 22,
                'name' => 'Nintendo Switch OLED',
                'price' => 44999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 23,
                'name' => 'ASUS ROG Zephyrus',
                'price' => 229999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 24,
                'name' => 'Amazon Echo Show 15',
                'price' => 24999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&h=300&fit=crop'])
            ],
        ];
    }

    /**
     * Sample accessories data.
     */
    private function getSampleAccessories()
    {
        return [
            (object)[
                'id' => 25,
                'name' => 'Bose QuietComfort 45',
                'price' => 29999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 26,
                'name' => 'Apple MagSafe Duo',
                'price' => 8999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 27,
                'name' => 'Logitech MX Master 3S',
                'price' => 12999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1527814050087-3793815479db?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 28,
                'name' => 'Samsung Smart Watch 6',
                'price' => 39999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 29,
                'name' => 'Anker PowerCore 26800',
                'price' => 7999.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop'])
            ],
            (object)[
                'id' => 30,
                'name' => 'Spigen Phone Case',
                'price' => 3499.00,
                'images' => json_encode(['https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=300&h=300&fit=crop'])
            ],
        ];
    }
}