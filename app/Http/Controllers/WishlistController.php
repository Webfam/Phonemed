<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display user's wishlist.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Sample wishlist items (in real app, fetch from database)
        $wishlistItems = [
            [
                'id' => 1,
                'product_id' => 1,
                'name' => 'iPhone 15 Pro',
                'price' => 189999,
                'original_price' => 229999,
                'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop',
                'added_at' => now()->subDays(2)
            ],
            [
                'id' => 2,
                'product_id' => 3,
                'name' => 'MacBook Air M2',
                'price' => 149999,
                'original_price' => 174999,
                'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop',
                'added_at' => now()->subDays(5)
            ],
            [
                'id' => 3,
                'product_id' => 5,
                'name' => 'PlayStation 5',
                'price' => 69999,
                'original_price' => 79999,
                'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop',
                'added_at' => now()->subDays(1)
            ],
        ];
        
        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * Toggle product in wishlist.
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);
        
        $productId = $request->input('product_id');
        $user = Auth::user();
        
        // In real app, you would:
        // 1. Check if product exists in wishlist
        // 2. Add or remove it
        // 3. Return appropriate response
        
        // For demo, simulate toggling
        $action = 'added'; // or 'removed' based on current state
        
        return response()->json([
            'success' => true,
            'action' => $action,
            'message' => $action === 'added' ? 'Added to wishlist!' : 'Removed from wishlist!'
        ]);
    }

    /**
     * Remove item from wishlist.
     */
    public function remove($id)
    {
        $user = Auth::user();
        
        // In real app, remove from database
        
        return response()->json([
            'success' => true,
            'message' => 'Removed from wishlist!'
        ]);
    }
}