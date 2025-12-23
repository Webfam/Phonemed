<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Orders\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderService;
    
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->middleware(['auth', 'verified'])->except(['mpesaCallback']);
    }
    
    public function customerOrders(Request $request)
    {
        try {
            $user = Auth::user();
            
            // Get customer by phone or user ID
            $orders = Order::with(['items.product', 'payments', 'delivery'])
                ->where(function($query) use ($user) {
                    $query->where('customer_phone', $user->phone)
                          ->orWhere('user_id', $user->id);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(15);
            
            return response()->json([
                'success' => true,
                'data' => $orders,
                'message' => 'Orders retrieved successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email',
                'customer_phone' => 'required|string',
                'customer_address' => 'required|string',
                'customer_city' => 'required|string',
                'delivery_method' => 'required|in:pickup,delivery',
                'payment_method' => 'required|in:mpesa,cash,card,bank',
                'delivery_notes' => 'nullable|string',
                'items' => 'required|array|min:1',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.variant_id' => 'nullable|exists:product_variants,id',
                'items.*.quantity' => 'required|integer|min:1',
            ]);
            
            // Use authenticated user's info if not provided
            if (!$request->has('customer_phone') && $user->phone) {
                $validated['customer_phone'] = $user->phone;
            }
            if (!$request->has('customer_email') && $user->email) {
                $validated['customer_email'] = $user->email;
            }
            
            DB::beginTransaction();
            
            $order = $this->orderService->createOrder($validated, $validated['items']);
            
            DB::commit();
            
            return response()->json([
                'success' => true,
                'data' => $order->load(['items.product', 'items.variant']),
                'message' => 'Order created successfully'
            ], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    // ... rest of the methods
}