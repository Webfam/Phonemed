<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Use is_active instead of status
        $products = Product::where('is_active', true)
                          ->orderBy('created_at', 'desc')
                          ->paginate(24);
        
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        // Try to get from database first
        $product = Product::where('is_active', true)
                         ->where('id', $id)
                         ->first();
        
        // If product not found in database, use sample data
        if (!$product) {
            $product = $this->getSampleProductData($id);
        }
        
        // Related products
        $relatedProducts = $this->getRelatedProducts($product->category_id ?? 1);

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    /**
     * Display products by category.
     */
    public function category($category)
    {
        // Map category names to IDs based on your actual categories
        $categoryMap = [
            'phones' => 1, // Assuming phones category has ID 1
            'electronics' => 2, // Assuming electronics category has ID 2
            'accessories' => 3, // Assuming accessories category has ID 3
        ];
        
        $categoryId = $categoryMap[$category] ?? null;
        
        if (!$categoryId) {
            abort(404, 'Category not found');
        }
        
        // Get products by category from database
        $products = Product::where('is_active', true)
                          ->where('category_id', $categoryId)
                          ->orderBy('created_at', 'desc')
                          ->take(18)
                          ->get();
        
        // If no products in database, use sample data
        if ($products->isEmpty()) {
            $products = collect($this->getCategoryProducts($category));
        }
        
        $categoryNames = [
            'phones' => 'Smartphones',
            'electronics' => 'Electronics',
            'accessories' => 'Accessories'
        ];
        
        $categoryData = [
            'name' => $categoryNames[$category] ?? ucfirst($category),
            'description' => $this->getCategoryDescription($category),
            'products' => $products
        ];
        
        return view('products.category', [
            'category' => $category,
            'categoryData' => $categoryData
        ]);
    }

    /**
     * Get sample product data for demo.
     */
    private function getSampleProductData($id)
    {
        $products = [
            1 => (object)[
                'id' => 1,
                'name' => 'iPhone 15 Pro',
                'slug' => 'iphone-15-pro',
                'sku' => 'IPH15P-256-BLK',
                'barcode' => '885909951234',
                'category_id' => 1,
                'brand_id' => 1,
                'price' => 189999.00,
                'compare_at_price' => 229999.00,
                'stock_quantity' => 42,
                'description' => 'Experience the pinnacle of smartphone technology with the iPhone 15 Pro. Featuring a stunning 6.1-inch Super Retina XDR display with ProMotion technology, the A17 Pro chip for unprecedented performance, and a revolutionary camera system.',
                'specifications' => json_encode([
                    'Display' => [
                        'Size' => '6.1 inches',
                        'Type' => 'Super Retina XDR OLED',
                        'Resolution' => '2556 x 1179 pixels',
                        'Refresh Rate' => '120Hz ProMotion'
                    ],
                    'Camera' => [
                        'Main Camera' => '48MP, f/1.78 aperture',
                        'Ultra Wide' => '12MP, f/2.2 aperture',
                        'Telephoto' => '12MP, 3x optical zoom',
                        'Front Camera' => '12MP, f/1.9 aperture'
                    ],
                    'Performance' => [
                        'Chipset' => 'A17 Pro (3nm)',
                        'CPU' => '6-core (2 performance + 4 efficiency)',
                        'GPU' => '6-core Apple GPU',
                        'RAM' => '8GB',
                        'Storage' => '256GB (NVMe)'
                    ],
                    'Battery' => [
                        'Capacity' => '3274 mAh',
                        'Battery Life' => 'Up to 29 hours video playback',
                        'Charging' => 'USB-C, 20W fast charging',
                        'Wireless Charging' => 'MagSafe, Qi2 compatible'
                    ]
                ]),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?w=800&h=800&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => true,
                'rating' => 4.8,
                'review_count' => 1247,
                'created_at' => now(),
                'updated_at' => now()
            ],
            2 => (object)[
                'id' => 2,
                'name' => 'Samsung Galaxy S24',
                'slug' => 'samsung-galaxy-s24',
                'sku' => 'SGS24-256-BLK',
                'barcode' => '885909951235',
                'category_id' => 1,
                'brand_id' => 2,
                'price' => 149999.00,
                'compare_at_price' => 179999.00,
                'stock_quantity' => 35,
                'description' => 'Samsung Galaxy S24 with advanced AI features and stunning display.',
                'specifications' => json_encode([]),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=800&h=800&fit=crop'
                ]),
                'is_active' => true,
                'is_featured' => true,
                'rating' => 4.7,
                'review_count' => 890,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more sample products as needed
        ];
        
        return $products[$id] ?? $products[1];
    }

    /**
     * Get related products for a category.
     */
    private function getRelatedProducts($categoryId, $limit = 6)
    {
        // Try to get from database
        $products = Product::where('is_active', true)
                          ->where('category_id', $categoryId)
                          ->where('id', '!=', request()->route('id'))
                          ->take($limit)
                          ->get();
        
        // If no products, use sample data
        if ($products->isEmpty()) {
            $categoryMap = [
                1 => 'phones',
                2 => 'electronics',
                3 => 'accessories'
            ];
            
            $category = $categoryMap[$categoryId] ?? 'phones';
            $sampleData = $this->getCategoryProducts($category);
            $products = collect(array_slice($sampleData, 0, $limit));
        }
        
        return $products;
    }

    /**
     * Get products for a specific category (sample data).
     */
    private function getCategoryProducts($category)
    {
        switch ($category) {
            case 'phones':
                return [
                    ['id' => 13, 'name' => 'Google Pixel 8', 'price' => 119999, 'image' => 'https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'],
                    ['id' => 14, 'name' => 'Samsung Galaxy S24', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300&h=300&fit=crop'],
                    ['id' => 15, 'name' => 'OnePlus 12', 'price' => 94999, 'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop'],
                    ['id' => 16, 'name' => 'iPhone 14 Plus', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop'],
                    ['id' => 17, 'name' => 'Xiaomi 13 Pro', 'price' => 89999, 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop'],
                    ['id' => 18, 'name' => 'Nothing Phone 2', 'price' => 69999, 'image' => 'https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'],
                ];
                
            case 'electronics':
                return [
                    ['id' => 19, 'name' => 'MacBook Air M2', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                    ['id' => 20, 'name' => 'PlayStation 5', 'price' => 69999, 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'],
                    ['id' => 21, 'name' => 'Samsung 4K TV', 'price' => 79999, 'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=300&h=300&fit=crop'],
                    ['id' => 22, 'name' => 'iPad Pro 12.9"', 'price' => 124999, 'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=300&h=300&fit=crop'],
                    ['id' => 23, 'name' => 'Xbox Series X', 'price' => 74999, 'image' => 'https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?w=300&h=300&fit=crop'],
                    ['id' => 24, 'name' => 'Google Nest Hub', 'price' => 24999, 'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&h=300&fit=crop'],
                ];
                
            case 'accessories':
                return [
                    ['id' => 25, 'name' => 'Sony WH-1000XM5', 'price' => 34999, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                    ['id' => 26, 'name' => 'Apple MagSafe', 'price' => 8999, 'image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop'],
                    ['id' => 27, 'name' => 'Apple Watch Series 9', 'price' => 54999, 'image' => 'https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop'],
                    ['id' => 28, 'name' => 'AirPods Pro 2', 'price' => 29999, 'image' => 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=300&h=300&fit=crop'],
                    ['id' => 29, 'name' => 'Logitech MX Master', 'price' => 12999, 'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=300&h=300&fit=crop'],
                    ['id' => 30, 'name' => 'Spigen Phone Case', 'price' => 3499, 'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=300&h=300&fit=crop'],
                ];
                
            default:
                return [];
        }
    }

    /**
     * Get category description.
     */
    private function getCategoryDescription($category)
    {
        $descriptions = [
            'phones' => 'Latest phones from top brands',
            'electronics' => 'Laptops, TVs, Gaming & Smart Home',
            'accessories' => 'Cases, Chargers, Headphones & more'
        ];
        
        return $descriptions[$category] ?? 'Browse our collection';
    }
}