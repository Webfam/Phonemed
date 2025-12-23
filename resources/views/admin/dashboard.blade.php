@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Dashboard</h1>
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">Today</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">This Week</button>
            <button type="button" class="btn btn-sm btn-outline-secondary active">This Month</button>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        <!-- Sales Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-primary border-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">Total Sales</div>
                            <div class="h4 mb-0">KES {{ number_format($stats['total_sales']) }}</div>
                        </div>
                        <div class="bg-primary text-white rounded-circle p-3">
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i>
                            Today: KES {{ number_format($stats['today_sales']) }}
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-success border-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">Total Orders</div>
                            <div class="h4 mb-0">{{ number_format($stats['total_orders']) }}</div>
                        </div>
                        <div class="bg-success text-white rounded-circle p-3">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-warning me-2">Pending: {{ $stats['pending_orders'] }}</span>
                        <span class="badge bg-info">Processing: {{ $stats['processing_orders'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-info border-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">Products</div>
                            <div class="h4 mb-0">{{ number_format($stats['total_products']) }}</div>
                        </div>
                        <div class="bg-info text-white rounded-circle p-3">
                            <i class="fas fa-box fa-2x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-danger me-2">Out of Stock: {{ $stats['out_of_stock'] }}</span>
                        <span class="badge bg-warning">Low Stock: {{ $stats['low_stock'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-warning border-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">Customers</div>
                            <div class="h4 mb-0">{{ number_format($stats['total_customers']) }}</div>
                        </div>
                        <div class="bg-warning text-white rounded-circle p-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="fas fa-user-plus"></i>
                            New Today: {{ $stats['new_customers_today'] }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Recent Orders Row -->
    <div class="row g-4">
        <!-- Sales Chart -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sales Overview (Last 7 Days)</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Top Selling Products</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach($topProducts as $product)
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <div class="fw-bold">{{ Str::limit($product->name, 30) }}</div>
                                <small class="text-muted">Sold: {{ $product->total_sold ?? 0 }}</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">
                                KES {{ number_format($product->price) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Orders</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="fw-bold">
                                            {{ $order->order_number }}
                                        </a>
                                    </td>
                                    <td>
                                        <div>{{ $order->customer_name }}</div>
                                        <small class="text-muted">{{ $order->customer_phone }}</small>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="fw-bold">KES {{ number_format($order->total_amount) }}</td>
                                    <td>
                                        <span class="status-badge bg-{{ $order->status === 'delivered' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge bg-{{ $order->payment_status === 'paid' ? 'success' : 'danger' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-light" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-light" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">No orders yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($salesData->pluck('date')->map(fn($date) => \Carbon\Carbon::parse($date)->format('M d'))->toArray()) !!},
            datasets: [{
                label: 'Sales (KES)',
                data: {!! json_encode($salesData->pluck('total')->toArray()) !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'KES ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'KES ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection