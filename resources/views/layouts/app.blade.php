<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PhoneMed') }} - Premium Mobile Phones & Accessories</title>
    <meta name="description" content="Buy genuine mobile phones, tablets, accessories, and smart devices in Kenya. Best prices, warranty, and fast delivery.">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --dark: #1f2937;
            --light: #f9fafb;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }
        
        .product-card {
            transition: all 0.3s;
            border: 1px solid #dee2e6;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }
        
        .category-card {
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            border-radius: 10px;
        }
        
        .category-card:hover {
            transform: scale(1.05);
        }
        
        .category-card img {
            transition: all 0.5s;
        }
        
        .category-card:hover img {
            transform: scale(1.1);
        }
        
        .badge-hot {
            background: linear-gradient(135deg, #f59e0b, #dc2626);
            color: white;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .top-announcement {
            background-color: var(--primary);
            color: white;
            font-size: 0.875rem;
        }
        
        .footer {
            background-color: var(--dark);
            color: white;
        }
        
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .search-box {
            max-width: 500px;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
        }
        
        /* Custom responsive adjustments */
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
                padding: 10px 0;
            }
            
            .search-box {
                margin: 15px 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Top Announcement Bar -->
    <div class="top-announcement py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <i class="fas fa-truck-fast me-2"></i>
                    <span>Free delivery in Nairobi for orders above KES 5,000</span>
                    <span class="mx-3">|</span>
                    <i class="fas fa-shield-alt me-2"></i>
                    <span>1 Year Warranty on all devices</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Header/Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="fas fa-mobile-alt text-primary fs-3 me-2"></i>
                <div>
                    <div class="fw-bold text-dark">PhoneMed</div>
                    <div class="text-muted small">Premium Mobile Store</div>
                </div>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main Navigation -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- Desktop Search (Centered) -->
                <div class="mx-lg-auto search-box d-none d-lg-block">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search for phones, brands, accessories...">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="d-flex align-items-center ms-lg-3">
                    <!-- Cart -->
                    <a href="#" class="position-relative me-4 text-dark">
                        <i class="fas fa-shopping-cart fs-4"></i>
                        <span class="cart-badge">3</span>
                    </a>
                    
                    <!-- User Account -->
                    @auth
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="ms-2 d-none d-lg-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-user me-2"></i>My Account</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-bag me-2"></i>My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="d-flex align-items-center text-dark text-decoration-none ms-3">
                        <i class="fas fa-user fs-5"></i>
                        <span class="ms-2 d-none d-lg-inline">Login / Register</span>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
        
        <!-- Mobile Search & Bottom Navigation -->
        <div class="container d-lg-none mt-2">
            <!-- Mobile Search -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-white">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" class="form-control" placeholder="Search products...">
            </div>
            
            <!-- Bottom Navigation Links -->
            <div class="border-top pt-3">
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/') }}" class="text-center text-decoration-none text-dark">
                        <i class="fas fa-home d-block fs-5"></i>
                        <small>Home</small>
                    </a>
                    <a href="{{ route('products.index') }}" class="text-center text-decoration-none text-dark">
                        <i class="fas fa-box d-block fs-5"></i>
                        <small>Products</small>
                    </a>
                    <a href="#" class="text-center text-decoration-none text-dark">
                        <i class="fas fa-fire d-block fs-5"></i>
                        <small>Hot Deals</small>
                    </a>
                    <a href="#" class="text-center text-decoration-none text-dark">
                        <i class="fas fa-headphones d-block fs-5"></i>
                        <small>Accessories</small>
                    </a>
                    <a href="#" class="text-center text-decoration-none text-dark">
                        <i class="fas fa-question-circle d-block fs-5"></i>
                        <small>Support</small>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
        
        <!-- Example Hero Section (for home page) -->
        @if(Request::is('/'))
        <div class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold mb-4">Latest Smartphones at Best Prices</h1>
                        <p class="lead mb-4">Get genuine mobile phones with 1-year warranty and free delivery in Nairobi. Shop the latest brands.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg px-5 me-3">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-5">
                            <i class="fas fa-tag me-2"></i>View Deals
                        </a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="https://via.placeholder.com/500x400/3b82f6/ffffff?text=PhoneMed+Hero" alt="Smartphones" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>
        </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-5">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-mobile-alt text-primary fs-3 me-2"></i>
                        <div>
                            <div class="h4 fw-bold">PhoneMed</div>
                            <div class="text-muted small">Premium Mobile Store</div>
                        </div>
                    </div>
                    <p class="text-muted mb-4">
                        Your trusted partner for genuine mobile phones, accessories, and smart devices in Kenya.
                    </p>
                    <div class="d-flex">
                        <a href="#" class="text-muted me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">About Us</a></li>
                        <li class="mb-2"><a href="#">Contact Us</a></li>
                        <li class="mb-2"><a href="#">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#">Terms & Conditions</a></li>
                        <li class="mb-2"><a href="#">Return Policy</a></li>
                        <li><a href="#">Warranty Information</a></li>
                    </ul>
                </div>

                <!-- Shop Categories -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-4">Shop By Category</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Smartphones</a></li>
                        <li class="mb-2"><a href="#">Tablets</a></li>
                        <li class="mb-2"><a href="#">Accessories</a></li>
                        <li class="mb-2"><a href="#">Smart Watches</a></li>
                        <li class="mb-2"><a href="#">Power Banks</a></li>
                        <li><a href="#">Headphones</a></li>
                    </ul>
                </div>

                <!-- Contact & Newsletter -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-4">Stay Updated</h5>
                    <p class="text-muted mb-4">Subscribe to our newsletter for the latest deals.</p>
                    <form class="mb-4">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-muted">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-primary me-3"></i>
                            <span>Nairobi, Kenya</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone text-primary me-3"></i>
                            <span>0712 345 678</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3"></i>
                            <span>info@phonemed.co.ke</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="border-secondary my-4">
            
            <div class="text-center text-muted">
                <p class="mb-2">&copy; {{ date('Y') }} PhoneMed. All rights reserved.</p>
                <p class="small">M-Pesa Paybill: 123456 | Account: Your Name</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Initialize Swiper
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Featured Products Slider
            const featuredSwiper = new Swiper('.featured-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 4 },
                },
                navigation: {
                    nextEl: '.swiper-button-next-featured',
                    prevEl: '.swiper-button-prev-featured',
                },
            });

            // Cart functionality
            const cartCount = document.querySelector('.cart-badge');
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            if (addToCartButtons.length > 0) {
                addToCartButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Update cart count
                        let currentCount = parseInt(cartCount.textContent);
                        cartCount.textContent = currentCount + 1;
                        
                        // Show Bootstrap toast
                        showToast('Product added to cart!', 'success');
                    });
                });
            }

            // Bootstrap Toast notification function
            function showToast(message, type = 'info') {
                // Create toast container if it doesn't exist
                let toastContainer = document.querySelector('.toast-container');
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                    document.body.appendChild(toastContainer);
                }
                
                // Create toast
                const toastId = 'toast-' + Date.now();
                const toast = document.createElement('div');
                toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : 'info'} border-0`;
                toast.setAttribute('id', toastId);
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
                
                toast.innerHTML = `
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                `;
                
                toastContainer.appendChild(toast);
                
                // Initialize and show toast
                const bsToast = new bootstrap.Toast(toast, {
                    autohide: true,
                    delay: 3000
                });
                bsToast.show();
                
                // Remove from DOM after hide
                toast.addEventListener('hidden.bs.toast', function() {
                    toast.remove();
                });
            }

            // Mobile search toggle
            const searchToggle = document.querySelector('.search-toggle');
            const mobileSearch = document.querySelector('.mobile-search');
            
            if (searchToggle && mobileSearch) {
                searchToggle.addEventListener('click', () => {
                    mobileSearch.classList.toggle('d-none');
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>