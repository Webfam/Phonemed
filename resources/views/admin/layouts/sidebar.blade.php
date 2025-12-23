<!-- Sidebar -->
<div id="sidebar" style="width: 250px; height: calc(100vh - 56px); position: fixed; left: 0; top: 56px; background: #fff; border-right: 1px solid #dee2e6; overflow-y: auto; z-index: 1000; transition: all 0.3s;">
    <div class="sidebar-content">
        <div class="sidebar-heading" style="padding: 10px 15px; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px;">MAIN NAVIGATION</div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-tachometer-alt" style="width: 20px; margin-right: 10px; text-align: center;"></i> Dashboard
        </a>
        
        <div class="sidebar-heading" style="padding: 10px 15px; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px;">SALES</div>
        <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-shopping-cart" style="width: 20px; margin-right: 10px; text-align: center;"></i> Orders
            <span class="badge bg-danger float-end">5</span>
        </a>
        <a href="{{ route('admin.payments.index') }}" class="sidebar-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-credit-card" style="width: 20px; margin-right: 10px; text-align: center;"></i> Payments
        </a>
        <a href="{{ route('admin.customers.index') }}" class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-users" style="width: 20px; margin-right: 10px; text-align: center;"></i> Customers
        </a>
        
        <div class="sidebar-heading" style="padding: 10px 15px; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px;">CATALOG</div>
        <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-box" style="width: 20px; margin-right: 10px; text-align: center;"></i> Products
        </a>
        <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-tags" style="width: 20px; margin-right: 10px; text-align: center;"></i> Categories
        </a>
        <a href="{{ route('admin.brands.index') }}" class="sidebar-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-copyright" style="width: 20px; margin-right: 10px; text-align: center;"></i> Brands
        </a>
        
        <div class="sidebar-heading" style="padding: 10px 15px; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px;">OPERATIONS</div>
        @if(Route::has('admin.deliveries.index'))
        <a href="{{ route('admin.deliveries.index') }}" class="sidebar-link {{ request()->routeIs('admin.deliveries.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-truck" style="width: 20px; margin-right: 10px; text-align: center;"></i> Deliveries
        </a>
        @endif
        
        <div class="sidebar-heading" style="padding: 10px 15px; font-size: 0.75rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px;">SYSTEM</div>
        @if(Route::has('admin.settings.general'))
        <a href="{{ route('admin.settings.general') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-cog" style="width: 20px; margin-right: 10px; text-align: center;"></i> Settings
        </a>
        @endif
        
        @if(Route::has('admin.promotions.index'))
        <a href="{{ route('admin.promotions.index') }}" class="sidebar-link" style="padding: 12px 15px; color: #495057; display: block; text-decoration: none; border-left: 3px solid transparent; transition: all 0.2s;">
            <i class="fas fa-gift" style="width: 20px; margin-right: 10px; text-align: center;"></i> Promotions
        </a>
        @endif
    </div>
</div>

<style>
    .sidebar-link:hover, .sidebar-link.active {
        background-color: #e9ecef;
        color: #0d6efd;
        border-left-color: #0d6efd;
    }
    
    .sidebar-collapsed {
        margin-left: -250px;
    }
</style>