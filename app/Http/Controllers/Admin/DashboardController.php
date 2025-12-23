<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Today's stats
        $today = now()->format('Y-m-d');
        
        try {
            $stats = [
                'total_orders' => Order::count(),
                'today_orders' => Order::whereDate('created_at', $today)->count(),
                'pending_orders' => Order::where('status', 'pending')->count(),
                'processing_orders' => Order::whereIn('status', ['confirmed', 'processing'])->count(),
                
                'total_sales' => Order::where('payment_status', 'paid')->sum('total_amount') ?? 0,
                'today_sales' => Order::where('payment_status', 'paid')
                    ->whereDate('created_at', $today)
                    ->sum('total_amount') ?? 0,
                
                'total_products' => Product::count(),
                'out_of_stock' => Product::where('stock_quantity', 0)->count(),
                'low_stock' => Product::where('stock_quantity', '<', 10)->count(),
                
                'total_customers' => Customer::count(),
                'new_customers_today' => Customer::whereDate('created_at', $today)->count(),
            ];

            // Recent orders
            $recentOrders = Order::with(['items.product'])
                ->latest()
                ->take(10)
                ->get();

            // Top selling products
            $topProducts = Product::withCount(['orders as total_sold' => function($query) {
                $query->select(DB::raw('COALESCE(SUM(quantity), 0)'));
            }])
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();

            // Sales chart data (last 7 days)
            $salesData = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COALESCE(SUM(total_amount), 0) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            return view('admin.dashboard', compact(
                'stats', 
                'recentOrders', 
                'topProducts',
                'salesData'
            ));
            
        } catch (\Exception $e) {
            // If there's an error (like tables don't exist yet), show empty dashboard
            return view('admin.dashboard', [
                'stats' => [
                    'total_orders' => 0,
                    'today_orders' => 0,
                    'pending_orders' => 0,
                    'processing_orders' => 0,
                    'total_sales' => 0,
                    'today_sales' => 0,
                    'total_products' => 0,
                    'out_of_stock' => 0,
                    'low_stock' => 0,
                    'total_customers' => 0,
                    'new_customers_today' => 0,
                ],
                'recentOrders' => collect(),
                'topProducts' => collect(),
                'salesData' => collect(),
            ]);
        }
    }
}