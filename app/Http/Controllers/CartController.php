<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        $cartItems = [];
        $subtotal = 0;
        
        foreach ($cart as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $subtotal += $itemTotal;
            
            $cartItems[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'image' => $item['image'],
                'total' => $itemTotal
            ];
        }
        
        $shipping = $subtotal > 5000 ? 0 : 500;
        $tax = $subtotal * 0.16;
        $total = $subtotal + $shipping + $tax;
        
        return view('cart.index', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    /**
     * Add item to cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $cart = Session::get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        // Get product details (in real app, fetch from database)
        $product = $this->getProductDetails($productId);
        
        if ($product) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'id' => $productId,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    'image' => $product['image']
                ];
            }
            
            Session::put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'cart_count' => $this->getCartCount(),
                'cart_total' => $this->getCartTotal()
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Product not found!'
        ], 404);
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $cart = Session::get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
                'cart_count' => $this->getCartCount(),
                'cart_total' => $this->getCartTotal()
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart!'
        ], 404);
    }

    /**
     * Remove item from cart.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);
        
        $cart = Session::get('cart', []);
        $productId = $request->input('product_id');
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart!',
                'cart_count' => $this->getCartCount(),
                'cart_total' => $this->getCartTotal()
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart!'
        ], 404);
    }

    /**
     * Clear the entire cart.
     */
    public function clear(Request $request)
    {
        Session::forget('cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully!',
            'cart_count' => 0,
            'cart_total' => 0
        ]);
    }

    /**
     * Get cart count.
     */
    private function getCartCount()
    {
        $cart = Session::get('cart', []);
        $count = 0;
        
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        
        return $count;
    }

    /**
     * Get cart total.
     */
    private function getCartTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return $total;
    }

    /**
     * Get product details (mock data).
     */
    private function getProductDetails($productId)
    {
        $products = [
            1 => ['name' => 'iPhone 15 Pro', 'price' => 189999, 'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop'],
            2 => ['name' => 'Samsung Galaxy S24', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300&h=300&fit=crop'],
            3 => ['name' => 'MacBook Air M2', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
            4 => ['name' => 'Sony WH-1000XM5', 'price' => 34999, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
            5 => ['name' => 'PlayStation 5', 'price' => 69999, 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'],
            6 => ['name' => 'Apple Watch Series 9', 'price' => 54999, 'image' => 'https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop'],
        ];
        
        return $products[$productId] ?? null;
    }
}