<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\Customer\CustomerScoringService;

class OrderService
{
    protected $customerScoringService;

    public function __construct(CustomerScoringService $customerScoringService)
    {
        $this->customerScoringService = $customerScoringService;
    }

    /**
     * Create a new order with validation and risk scoring
     */
    public function createOrder(array $orderData, array $items): Order
    {
        return DB::transaction(function () use ($orderData, $items) {
            // Generate order number
            $orderNumber = 'ORD-' . strtoupper(Str::random(6)) . '-' . time();
            
            // Calculate totals
            $totals = $this->calculateOrderTotals($items);
            
            // Create order
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_name' => $orderData['customer_name'],
                'customer_email' => $orderData['customer_email'],
                'customer_phone' => $orderData['customer_phone'],
                'customer_address' => $orderData['customer_address'],
                'customer_city' => $orderData['customer_city'],
                'customer_country' => $orderData['customer_country'] ?? 'Kenya',
                'delivery_method' => $orderData['delivery_method'] ?? 'delivery',
                'delivery_notes' => $orderData['delivery_notes'] ?? null,
                'payment_method' => $orderData['payment_method'] ?? 'mpesa',
                'subtotal' => $totals['subtotal'],
                'tax_amount' => $totals['tax_amount'],
                'shipping_cost' => $totals['shipping_cost'],
                'discount_amount' => $totals['discount_amount'],
                'total_amount' => $totals['total'],
                'status' => 'pending',
                'payment_status' => 'pending',
            ]);

            // Create order items
            $this->createOrderItems($order, $items);

            // Calculate risk score
            $riskAssessment = $this->assessOrderRisk($order, $items);
            $order->update([
                'risk_score' => $riskAssessment['score'],
                'risk_reasons' => $riskAssessment['reasons'],
                'requires_review' => $riskAssessment['requires_review']
            ]);

            // Update customer if exists or create
            $this->updateCustomerRecord($order);

            // Log order creation
            $this->logOrderActivity($order, 'Order created', $orderData);

            return $order->fresh();
        });
    }

    /**
     * Calculate order totals including tax and shipping
     */
    private function calculateOrderTotals(array $items): array
    {
        $subtotal = 0;
        
        foreach ($items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $unitPrice = $item['variant_id'] 
                ? $product->variants()->find($item['variant_id'])->price 
                : $product->price;
            
            $subtotal += $unitPrice * $item['quantity'];
        }

        // Apply tax (16% VAT for Kenya)
        $taxAmount = $subtotal * 0.16;
        
        // Calculate shipping (simplified - would be based on rules)
        $shippingCost = $this->calculateShippingCost($items);
        
        // Apply any promotions/discounts (to be implemented)
        $discountAmount = 0;
        
        $total = $subtotal + $taxAmount + $shippingCost - $discountAmount;

        return [
            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'shipping_cost' => $shippingCost,
            'discount_amount' => $discountAmount,
            'total' => $total,
        ];
    }

    /**
     * Create order items with inventory check
     */
    private function createOrderItems(Order $order, array $items): void
    {
        foreach ($items as $item) {
            $product = Product::findOrFail($item['product_id']);
            
            // Check stock availability
            if ($product->stock_quantity < $item['quantity']) {
                throw new \Exception("Insufficient stock for product: {$product->name}");
            }

            // Determine price based on variant
            $unitPrice = $product->price;
            $variantName = null;
            
            if ($item['variant_id']) {
                $variant = $product->variants()->findOrFail($item['variant_id']);
                $unitPrice = $variant->price;
                $variantName = $variant->name;
                
                // Update variant stock
                $variant->decrement('stock_quantity', $item['quantity']);
            }

            // Update product stock
            $product->decrement('stock_quantity', $item['quantity']);

            // Create order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'variant_id' => $item['variant_id'],
                'product_name' => $product->name,
                'variant_name' => $variantName,
                'sku' => $product->sku ?? 'SKU-' . $product->id,
                'unit_price' => $unitPrice,
                'quantity' => $item['quantity'],
                'total_price' => $unitPrice * $item['quantity'],
                'warranty_period' => $product->warranty_period,
            ]);
        }
    }

    /**
     * Assess order risk based on various factors
     */
    private function assessOrderRisk(Order $order, array $items): array
    {
        $score = 0;
        $reasons = [];
        
        // High value order risk
        $orderValue = $order->total_amount;
        if ($orderValue > 50000) {
            $score += 30;
            $reasons[] = 'High value order (> KES 50,000)';
        }
        
        // Multiple quantity risk
        $totalItems = array_sum(array_column($items, 'quantity'));
        if ($totalItems > 10) {
            $score += 20;
            $reasons[] = 'Large quantity ordered';
        }
        
        // New customer risk (would check customer history)
        // $customerRisk = $this->customerScoringService->getRiskScore($order->customer_phone);
        // $score += $customerRisk;
        
        $requiresReview = $score > 50; // Threshold for manual review

        return [
            'score' => $score,
            'reasons' => implode(', ', $reasons),
            'requires_review' => $requiresReview
        ];
    }

    /**
     * Calculate shipping cost based on rules
     */
    private function calculateShippingCost(array $items): float
    {
        // Simplified shipping calculation
        // In reality, this would consider:
        // - Delivery zone
        // - Order weight/size
        // - Promotional free shipping
        // - Delivery method
        
        $totalItems = array_sum(array_column($items, 'quantity'));
        
        if ($totalItems <= 2) {
            return 200; // KES 200 for small orders
        } elseif ($totalItems <= 5) {
            return 350; // KES 350 for medium orders
        } else {
            return 500; // KES 500 for large orders
        }
    }

    /**
     * Update or create customer record
     */
    private function updateCustomerRecord(Order $order): void
    {
        $customer = Customer::firstOrCreate(
            ['phone' => $order->customer_phone],
            [
                'name' => $order->customer_name,
                'email' => $order->customer_email,
                'address' => $order->customer_address,
                'city' => $order->customer_city,
                'country' => $order->customer_country,
            ]
        );

        // Update order with customer ID
        $order->customer_id = $customer->id;
        $order->save();
    }

    /**
     * Log order activity
     */
    private function logOrderActivity(Order $order, string $action, array $data = []): void
    {
        // Would create an audit log entry
        // This is a simplified version
        $order->status_history = array_merge(
            $order->status_history ?? [],
            [[
                'status' => $order->status,
                'action' => $action,
                'data' => $data,
                'timestamp' => now()->toISOString(),
            ]]
        );
        $order->save();
    }

    /**
     * Split order if items have different shipping requirements
     */
    public function splitOrderIfNeeded(Order $order): array
    {
        // Logic for order splitting based on:
        // 1. Delivery zones
        // 2. Stock availability (pre-order vs in-stock)
        // 3. Special handling requirements
        
        $items = $order->items;
        $groups = [];
        
        // Simplified grouping by product category
        foreach ($items as $item) {
            $categoryId = $item->product->category_id;
            if (!isset($groups[$categoryId])) {
                $groups[$categoryId] = [];
            }
            $groups[$categoryId][] = $item;
        }
        
        // If only one group, no splitting needed
        if (count($groups) <= 1) {
            return [$order];
        }
        
        // Create split orders
        $splitOrders = [];
        foreach ($groups as $categoryId => $groupItems) {
            $splitOrder = $this->createSplitOrder($order, $groupItems, "Split for category {$categoryId}");
            $splitOrders[] = $splitOrder;
        }
        
        return $splitOrders;
    }

    /**
     * Update order status with validation
     */
    public function updateOrderStatus(Order $order, string $newStatus, string $notes = null): Order
    {
        $validTransitions = [
            'pending' => ['confirmed', 'cancelled'],
            'confirmed' => ['processing', 'cancelled'],
            'processing' => ['ready_for_delivery', 'on_hold'],
            'ready_for_delivery' => ['out_for_delivery'],
            'out_for_delivery' => ['delivered'],
            'delivered' => ['refunded'],
            'on_hold' => ['processing', 'cancelled'],
            'cancelled' => [],
            'refunded' => [],
        ];

        if (!in_array($newStatus, $validTransitions[$order->status] ?? [])) {
            throw new \Exception("Invalid status transition from {$order->status} to {$newStatus}");
        }

        // Update status timestamps
        $timestampField = $newStatus . '_at';
        $updateData = ['status' => $newStatus];
        
        if (in_array($newStatus, ['confirmed', 'processing', 'delivered', 'cancelled'])) {
            $updateData[$timestampField] = now();
        }

        $order->update($updateData);

        // Log status change
        $this->logOrderActivity($order, "Status changed to {$newStatus}", [
            'previous_status' => $order->status,
            'notes' => $notes
        ]);

        return $order->fresh();
    }
}