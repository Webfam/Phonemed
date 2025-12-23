<!-- Top Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
    <div class="container-fluid">
        <!-- Sidebar Toggle -->
        <button class="btn btn-light me-2" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-mobile-alt me-2 text-primary"></i>
            PhoneMed Admin
        </a>
        
        <!-- Right Side -->
        <div class="navbar-nav ms-auto align-items-center">
            <!-- Notifications -->
            <div class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <h6 class="dropdown-header">Notifications</h6>
                    <a class="dropdown-item" href="{{ route('admin.orders.index') }}">
                        <small>New order #ORD-12345</small>
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.payments.index') }}">
                        <small>Payment received</small>
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                        <small>Low stock alert</small>
                    </a>
                </div>
            </div>
            
            <!-- User Menu -->
            <div class="nav-item dropdown">
                @php
                    $admin = auth()->guard('admin')->user();
                    $initials = strtoupper(substr($admin->name ?? 'A', 0, 1));
                @endphp
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="avatar me-2" style="width: 40px; height: 40px; border-radius: 50%; background-color: #6c757d; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                        {{ $initials }}
                    </div>
                    <span class="d-none d-md-inline">{{ $admin->name ?? 'Admin' }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>