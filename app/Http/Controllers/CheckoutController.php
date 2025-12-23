<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display checkout page.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        
        $user = Auth::user();
        
        // Calculate totals
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $shipping = $subtotal > 5000 ? 0 : 500;
        $tax = $subtotal * 0.16;
        $total = $subtotal + $shipping + $tax;
        
        return view('checkout.index', compact('user', 'cart', 'subtotal', 'shipping', 'tax', 'total'));
    }

    /**
     * Process checkout.
     */
    public function process(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'shipping_city' => 'required|string|max:100',
            'shipping_postal_code' => 'required|string|max:20',
            'billing_same' => 'nullable|boolean',
            'billing_name' => 'required_if:billing_same,false|string|max:255',
            'billing_address' => 'required_if:billing_same,false|string|max:500',
            'billing_city' => 'required_if:billing_same,false|string|max:100',
            'payment_method' => 'required|in:credit_card,mpesa,cod',
        ]);
        
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        
        // Generate order number
        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(uniqid());
        
        // Create order data
        $orderData = [
            'order_number' => $orderNumber,
            'user_id' => Auth::id(),
            'shipping_info' => [
                'name' => $request->shipping_name,
                'email' => $request->shipping_email,
                'phone' => $request->shipping_phone,
                'address' => $request->shipping_address,
                'city' => $request->shipping_city,
                'postal_code' => $request->shipping_postal_code,
            ],
            'billing_info' => $request->billing_same ? [
                'name' => $request->shipping_name,
                'address' => $request->shipping_address,
                'city' => $request->shipping_city,
            ] : [
                'name' => $request->billing_name,
                'address' => $request->billing_address,
                'city' => $request->billing_city,
            ],
            'payment_method' => $request->payment_method,
            'items' => $cart,
            'status' => 'pending',
            'created_at' => now(),
        ];
        
        // Store order in session (in real app, save to database)
        Session::put('current_order', $orderData);
        
        // Clear cart
        Session::forget('cart');
        
        // Redirect based on payment method
        if ($request->payment_method === 'mpesa') {
            // Simulate M-Pesa payment process
            return $this->processMpesaPayment($orderData);
        } elseif ($request->payment_method === 'credit_card') {
            // Simulate credit card payment
            return $this->processCreditCardPayment($orderData);
        } else {
            // Cash on delivery
            return redirect()->route('checkout.success')->with([
                'order_number' => $orderNumber,
                'success' => 'Order placed successfully! You will pay on delivery.'
            ]);
        }
    }

    /**
     * Process M-Pesa payment.
     */
    private function processMpesaPayment($orderData)
    {
        // Simulate M-Pesa payment processing
        sleep(2); // Simulate API call delay
        
        // For demo purposes, assume payment is successful
        $orderData['status'] = 'paid';
        $orderData['payment_reference'] = 'MPESA-' . strtoupper(uniqid());
        Session::put('current_order', $orderData);
        
        return redirect()->route('checkout.success')->with([
            'order_number' => $orderData['order_number'],
            'success' => 'Payment successful! Your order has been placed.'
        ]);
    }

    /**
     * Process credit card payment.
     */
    private function processCreditCardPayment($orderData)
    {
        // Simulate credit card payment processing
        sleep(3); // Simulate API call delay
        
        // For demo purposes, assume payment is successful
        $orderData['status'] = 'paid';
        $orderData['payment_reference'] = 'CARD-' . strtoupper(uniqid());
        Session::put('current_order', $orderData);
        
        return redirect()->route('checkout.success')->with([
            'order_number' => $orderData['order_number'],
            'success' => 'Payment successful! Your order has been placed.'
        ]);
    }

    /**
     * Show checkout success page.
     */
    public function success()
    {
        $order = Session::get('current_order');
        
        if (!$order) {
            return redirect()->route('home');
        }
        
        return view('checkout.success', compact('order'));
    }

    /**
     * Show checkout cancel page.
     */
    public function cancel()
    {
        return view('checkout.cancel');
    }
}