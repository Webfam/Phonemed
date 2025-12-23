@extends('layouts.app')

@section('content')
    <!-- Modern Hero Section -->
    <section class="position-relative overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);">
        <!-- Animated Background Particles -->
        <div class="position-absolute top-0 start-0 w-100 h-100" id="particles-js"></div>
        
        <div class="container py-4 py-lg-5">
            <div class="row align-items-center">
                <!-- Content Column -->
                <div class="col-lg-6 py-4 py-lg-0">
                    <div class="pe-lg-4">
                        <!-- Animated Badge with Sparkle -->
                        <div class="d-inline-block position-relative mb-3">
                            <div class="badge bg-primary bg-opacity-20 text-primary px-4 py-2 rounded-pill fw-semibold border border-primary border-opacity-25 shadow-sm">
                                <i class="fas fa-bolt me-2"></i> FLASH SALE
                            </div>
                            <div class="position-absolute top-0 end-0 translate-middle">
                                <i class="fas fa-sparkles text-warning fa-spin" style="font-size: 0.8rem;"></i>
                            </div>
                        </div>
                        
                        <!-- Main Heading with Animated Gradient -->
                        <h1 class="display-5 fw-bold mb-3">
                            <span class="text-white">Premium</span> 
                            <span class="text-gradient-cute">Electronics</span><br>
                            <span class="text-white">Experience</span>
                        </h1>
                        
                        <!-- Subtitle -->
                        <p class="lead text-white-75 mb-3" style="font-size: 1.1rem;">
                            Discover cutting-edge smartphones, electronics,<br>
                            and accessories with exclusive deals.
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 py-2 rounded-pill shadow-sm hover-lift">
                                <i class="fas fa-shopping-bag me-2"></i> Shop Now
                            </a>
                            <a href="#categories" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill border-2 hover-lift">
                                <i class="fas fa-layer-group me-2"></i> Browse Categories
                            </a>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="row g-2 mt-3">
                            <div class="col-4">
                                <div class="bg-white bg-opacity-10 rounded-3 p-2 text-center border border-white border-opacity-10 hover-scale">
                                    <div class="h4 fw-bold text-white mb-0">500+</div>
                                    <div class="text-white-75 small">Premium Products</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-white bg-opacity-10 rounded-3 p-2 text-center border border-white border-opacity-10 hover-scale">
                                    <div class="h4 fw-bold text-white mb-0">24H</div>
                                    <div class="text-white-75 small">Fast Delivery</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-white bg-opacity-10 rounded-3 p-2 text-center border border-white border-opacity-10 hover-scale">
                                    <div class="h4 fw-bold text-white mb-0">1YR</div>
                                    <div class="text-white-75 small">Warranty</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image Column with Floating Elements -->
                <div class="col-lg-6 position-relative">
                    <div class="position-relative">
                        <!-- Main Hero Image -->
                        <div class="position-relative">
                            <div class="bg-gradient-cute rounded-4 position-absolute top-0 start-0 w-100 h-100 opacity-15 blur-15"></div>
                            <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="Premium Electronics" 
                                 class="img-fluid rounded-4 shadow-lg position-relative" 
                                 style="border: 6px solid rgba(255,255,255,0.08);">
                        </div>
                        
                        <!-- Floating Products -->
                        <div class="position-absolute top-0 end-0 mt-n3 me-n3 d-none d-lg-block">
                            <div class="card border-0 shadow-lg" style="width: 200px; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2">
                                            <i class="fas fa-mobile-alt text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">iPhone 15 Pro</h6>
                                            <small class="text-muted">Apple</small>
                                        </div>
                                        <span class="badge bg-danger ms-1">-20%</span>
                                    </div>
                                    <div class="mb-2">
                                        <div class="text-warning small">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="h5 fw-bold text-primary mb-0">KES 189,999</span>
                                        <small class="text-muted text-decoration-line-through">KES 229,999</small>
                                    </div>
                                    <button class="btn btn-sm btn-primary w-100 rounded-pill">
                                        <i class="fas fa-cart-plus me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Icons -->
                        <div class="position-absolute bottom-0 start-0 mb-3 ms-3 d-none d-lg-block">
                            <div class="bg-white rounded-circle p-2 shadow-lg hover-float">
                                <i class="fas fa-laptop text-primary"></i>
                            </div>
                        </div>
                        
                        <div class="position-absolute top-0 start-0 mt-3 ms-3 d-none d-lg-block">
                            <div class="bg-white rounded-circle p-2 shadow-lg hover-float">
                                <i class="fas fa-headphones text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0;">
            <svg class="position-relative" width="100%" height="40px" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                      opacity=".25" fill="currentColor" class="text-white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" 
                      opacity=".5" fill="currentColor" class="text-white"></path>
            </svg>
        </div>
    </section>

    <!-- Main Categories Section -->
    <section id="categories" class="py-4">
        <div class="container py-4">
            <div class="text-center mb-4">
                <h2 class="display-5 fw-bold mb-2">Shop by <span class="text-gradient-cute">Category</span></h2>
                <p class="text-muted">Browse our curated collections</p>
            </div>
            
            <div class="row g-3">
                <!-- Phones Category -->
                <div class="col-lg-4">
                    <div class="card category-card border-0 shadow-lg overflow-hidden hover-lift" 
                         onclick="window.location='{{ route('products.index', ['category' => 'phones']) }}'" 
                         style="cursor: pointer;">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=400&fit=crop" 
                                 alt="Phones" 
                                 class="img-fluid w-100" 
                                 style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40"></div>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary px-3 py-2">
                                    <i class="fas fa-mobile-alt me-2"></i> Phones
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-4">
                                <h3 class="text-white fw-bold mb-2">Smartphones</h3>
                                <p class="text-white-75 mb-3">Latest smartphones, iPhones, Androids & more</p>
                                <div class="d-flex align-items-center text-white">
                                    <span class="me-3">45+ Products</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Electronics Category -->
                <div class="col-lg-4">
                    <div class="card category-card border-0 shadow-lg overflow-hidden hover-lift" 
                         onclick="window.location='{{ route('products.index', ['category' => 'electronics']) }}'" 
                         style="cursor: pointer;">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=400&fit=crop" 
                                 alt="Electronics" 
                                 class="img-fluid w-100" 
                                 style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40"></div>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-laptop me-2"></i> Electronics
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-4">
                                <h3 class="text-white fw-bold mb-2">Electronics</h3>
                                <p class="text-white-75 mb-3">Laptops, TVs, Gaming & Smart Home devices</p>
                                <div class="d-flex align-items-center text-white">
                                    <span class="me-3">120+ Products</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Accessories Category -->
                <div class="col-lg-4">
                    <div class="card category-card border-0 shadow-lg overflow-hidden hover-lift" 
                         onclick="window.location='{{ route('products.index', ['category' => 'accessories']) }}'" 
                         style="cursor: pointer;">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=800&h=400&fit=crop" 
                                 alt="Accessories" 
                                 class="img-fluid w-100" 
                                 style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40"></div>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-warning px-3 py-2">
                                    <i class="fas fa-headphones me-2"></i> Accessories
                                </span>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-4">
                                <h3 class="text-white fw-bold mb-2">Accessories</h3>
                                <p class="text-white-75 mb-3">Cases, Chargers, Headphones & more</p>
                                <div class="d-flex align-items-center text-white">
                                    <span class="me-3">85+ Products</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products - 6 per row -->
    <section class="py-4 bg-light">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="display-5 fw-bold mb-1">
                        <i class="fas fa-star text-warning me-2"></i>
                        <span class="text-gradient-cute">Featured Products</span>
                    </h2>
                    <p class="text-muted mb-0">Our top picks across all categories</p>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary rounded-pill">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            
            <div class="row g-3">
                @php
                    $featuredProducts = [
                        [
                            'id' => 1,
                            'name' => 'iPhone 15 Pro',
                            'category' => 'phones',
                            'price' => 189999,
                            'original_price' => 229999,
                            'rating' => 4.8,
                            'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop',
                            'badge' => 'NEW',
                            'badge_color' => 'danger'
                        ],
                        [
                            'id' => 2,
                            'name' => 'Samsung Galaxy S24',
                            'category' => 'phones',
                            'price' => 149999,
                            'original_price' => 179999,
                            'rating' => 4.7,
                            'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300&h=300&fit=crop',
                            'badge' => 'BEST',
                            'badge_color' => 'success'
                        ],
                        [
                            'id' => 3,
                            'name' => 'MacBook Air M2',
                            'category' => 'electronics',
                            'price' => 149999,
                            'original_price' => 174999,
                            'rating' => 4.9,
                            'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop',
                            'badge' => 'TRENDING',
                            'badge_color' => 'primary'
                        ],
                        [
                            'id' => 4,
                            'name' => 'Sony WH-1000XM5',
                            'category' => 'accessories',
                            'price' => 34999,
                            'original_price' => 44999,
                            'rating' => 4.6,
                            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop',
                            'badge' => 'SALE',
                            'badge_color' => 'warning'
                        ],
                        [
                            'id' => 5,
                            'name' => 'PlayStation 5',
                            'category' => 'electronics',
                            'price' => 69999,
                            'original_price' => 79999,
                            'rating' => 4.8,
                            'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop',
                            'badge' => 'HOT',
                            'badge_color' => 'danger'
                        ],
                        [
                            'id' => 6,
                            'name' => 'Apple Watch Series 9',
                            'category' => 'accessories',
                            'price' => 54999,
                            'original_price' => 64999,
                            'rating' => 4.5,
                            'image' => 'https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop',
                            'badge' => 'NEW',
                            'badge_color' => 'info'
                        ],
                    ];
                @endphp
                
                @foreach($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('products.show', $product['id']) }}" class="card product-card border-0 shadow-sm text-decoration-none hover-lift">
                        <div class="position-relative">
                            <!-- Badge -->
                            @if(isset($product['badge']))
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-{{ $product['badge_color'] }} px-2 py-1">
                                    {{ $product['badge'] }}
                                </span>
                            </div>
                            @endif
                            
                            <!-- Wishlist Button -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <button class="btn btn-sm btn-light rounded-circle wishlist-btn" 
                                        data-product-id="{{ $product['id'] }}"
                                        style="width: 28px; height: 28px;">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            
                            <!-- Product Image -->
                            <div class="text-center p-3" style="height: 160px;">
                                <img src="{{ $product['image'] }}" 
                                     alt="{{ $product['name'] }}" 
                                     class="img-fluid" 
                                     style="max-height: 130px; object-fit: contain;">
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="card-body p-3">
                            <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                <i class="fas fa-tag me-1"></i> 
                                {{ ucfirst($product['category']) }}
                            </small>
                            <h6 class="fw-bold mb-2" style="font-size: 0.9rem; line-height: 1.3;">
                                {{ $product['name'] }}
                            </h6>
                            
                            <!-- Rating -->
                            <div class="d-flex align-items-center mb-2">
                                <div class="text-warning me-1 small">
                                    @for($j = 1; $j <= 5; $j++)
                                        @if($j <= floor($product['rating']))
                                            <i class="fas fa-star"></i>
                                        @elseif($j == ceil($product['rating']) && $product['rating'] != floor($product['rating']))
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <small class="text-muted ms-1">{{ $product['rating'] }}</small>
                            </div>
                            
                            <!-- Price -->
                            <div class="d-flex align-items-center">
                                <span class="h6 fw-bold text-primary mb-0">
                                    KES {{ number_format($product['price']) }}
                                </span>
                                @if($product['original_price'] > $product['price'])
                                <small class="text-muted text-decoration-line-through ms-2">
                                    KES {{ number_format($product['original_price']) }}
                                </small>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Flash Sale Section -->
    <section id="deals" class="py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container py-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                <div class="text-center text-md-start mb-2 mb-md-0">
                    <h2 class="display-5 fw-bold text-white mb-1">
                        <i class="fas fa-bolt me-2"></i>Flash <span class="text-warning">Sale</span>
                    </h2>
                    <p class="text-white-75 mb-0">Limited time offers. Don't miss out!</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="bg-dark bg-opacity-25 rounded-pill p-2">
                        <div class="d-flex align-items-center">
                            <div class="text-center px-2">
                                <div class="h4 fw-bold text-white mb-0" id="hours">12</div>
                                <small class="text-white-50">Hours</small>
                            </div>
                            <div class="text-white-50 px-1">:</div>
                            <div class="text-center px-2">
                                <div class="h4 fw-bold text-white mb-0" id="minutes">45</div>
                                <small class="text-white-50">Mins</small>
                            </div>
                            <div class="text-white-50 px-1">:</div>
                            <div class="text-center px-2">
                                <div class="h4 fw-bold text-white mb-0" id="seconds">30</div>
                                <small class="text-white-50">Secs</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Flash Sale Products - 6 per row -->
            <div class="row g-3">
                @php
                    $flashProducts = [
                        [
                            'id' => 7,
                            'name' => 'Google Pixel 8 Pro',
                            'category' => 'phones',
                            'price' => 119999,
                            'original_price' => 149999,
                            'discount' => 20,
                            'image' => 'https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop',
                            'sold' => 42,
                            'stock' => 58
                        ],
                        [
                            'id' => 8,
                            'name' => 'Dell XPS 15',
                            'category' => 'electronics',
                            'price' => 199999,
                            'original_price' => 249999,
                            'discount' => 20,
                            'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop',
                            'sold' => 35,
                            'stock' => 65
                        ],
                        [
                            'id' => 9,
                            'name' => 'AirPods Pro 2',
                            'category' => 'accessories',
                            'price' => 29999,
                            'original_price' => 39999,
                            'discount' => 25,
                            'image' => 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=300&h=300&fit=crop',
                            'sold' => 78,
                            'stock' => 22
                        ],
                        [
                            'id' => 10,
                            'name' => 'Samsung 4K TV',
                            'category' => 'electronics',
                            'price' => 79999,
                            'original_price' => 99999,
                            'discount' => 20,
                            'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=300&h=300&fit=crop',
                            'sold' => 28,
                            'stock' => 72
                        ],
                        [
                            'id' => 11,
                            'name' => 'iPad Pro 12.9"',
                            'category' => 'electronics',
                            'price' => 124999,
                            'original_price' => 149999,
                            'discount' => 17,
                            'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=300&h=300&fit=crop',
                            'sold' => 31,
                            'stock' => 69
                        ],
                        [
                            'id' => 12,
                            'name' => 'Razer BlackWidow',
                            'category' => 'accessories',
                            'price' => 15999,
                            'original_price' => 19999,
                            'discount' => 20,
                            'image' => 'https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=300&h=300&fit=crop',
                            'sold' => 46,
                            'stock' => 54
                        ],
                    ];
                @endphp
                
                @foreach($flashProducts as $product)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 shadow-lg h-100 overflow-hidden hover-lift">
                        <!-- Flash Badge -->
                        <div class="position-absolute top-0 start-0 m-2">
                            <span class="badge bg-danger px-2 py-1">
                                <i class="fas fa-bolt me-1"></i> FLASH
                            </span>
                        </div>
                        
                        <!-- Product Image -->
                        <div class="text-center p-3" style="height: 140px; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                            <img src="{{ $product['image'] }}" 
                                 alt="{{ $product['name'] }}" 
                                 class="img-fluid" 
                                 style="max-height: 110px; object-fit: contain;">
                        </div>
                        
                        <!-- Product Info -->
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-2" style="font-size: 0.9rem;">
                                {{ $product['name'] }}
                            </h6>
                            
                            <!-- Price & Discount -->
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="h6 fw-bold text-primary mb-0">
                                        KES {{ number_format($product['price']) }}
                                    </span>
                                    <span class="badge bg-success">-{{ $product['discount'] }}%</span>
                                </div>
                                <small class="text-muted text-decoration-line-through">
                                    KES {{ number_format($product['original_price']) }}
                                </small>
                            </div>
                            
                            <!-- Stock Progress -->
                            <div class="mb-3">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-danger" 
                                         style="width: {{ ($product['sold'] / ($product['sold'] + $product['stock'])) * 100 }}%">
                                    </div>
                                </div>
                                <small class="text-muted d-block text-center">
                                    {{ $product['sold'] }} sold • {{ $product['stock'] }} left
                                </small>
                            </div>
                            
                            <!-- Quick Add Button -->
                            <button class="btn btn-primary btn-sm w-100 rounded-pill add-to-cart"
                                    data-product-id="{{ $product['id'] }}">
                                <i class="fas fa-cart-plus me-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Category Sections - 6 products each -->
    <section id="phones-section" class="py-4 bg-white">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="display-5 fw-bold mb-1">
                        <i class="fas fa-mobile-alt text-primary me-2"></i>
                        <span class="text-gradient-cute">Smartphones</span>
                    </h2>
                    <p class="text-muted mb-0">Latest phones from top brands</p>
                </div>
                <a href="{{ route('products.index', ['category' => 'phones']) }}" class="btn btn-outline-primary rounded-pill">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            
            <div class="row g-3">
                @php
                    $phones = [
                        ['id' => 13, 'name' => 'OnePlus 12', 'price' => 94999, 'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop'],
                        ['id' => 14, 'name' => 'Samsung Galaxy Z Flip', 'price' => 129999, 'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=300&h=300&fit=crop'],
                        ['id' => 15, 'name' => 'iPhone 14 Plus', 'price' => 149999, 'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop'],
                        ['id' => 16, 'name' => 'Google Pixel 7a', 'price' => 64999, 'image' => 'https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'],
                        ['id' => 17, 'name' => 'Xiaomi 13 Pro', 'price' => 89999, 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop'],
                        ['id' => 18, 'name' => 'Nothing Phone 2', 'price' => 69999, 'image' => 'https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop'],
                    ];
                @endphp
                
                @foreach($phones as $phone)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('products.show', $phone['id']) }}" class="card product-card border-0 shadow-sm text-decoration-none hover-lift">
                        <div class="text-center p-3" style="height: 140px;">
                            <img src="{{ $phone['image'] }}" 
                                 alt="{{ $phone['name'] }}" 
                                 class="img-fluid" 
                                 style="max-height: 110px; object-fit: contain;">
                        </div>
                        <div class="card-body p-3 text-center">
                            <h6 class="fw-bold mb-2" style="font-size: 0.85rem;">{{ $phone['name'] }}</h6>
                            <div class="text-warning small mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="h6 fw-bold text-primary">KES {{ number_format($phone['price']) }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="electronics-section" class="py-4 bg-light">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="display-5 fw-bold mb-1">
                        <i class="fas fa-laptop text-success me-2"></i>
                        <span class="text-gradient-cute">Electronics</span>
                    </h2>
                    <p class="text-muted mb-0">Laptops, TVs, Gaming & Smart Home</p>
                </div>
                <a href="{{ route('products.index', ['category' => 'electronics']) }}" class="btn btn-outline-success rounded-pill">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            
            <div class="row g-3">
                @php
                    $electronics = [
                        ['id' => 19, 'name' => 'HP Spectre x360', 'price' => 179999, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['id' => 20, 'name' => 'Xbox Series X', 'price' => 74999, 'image' => 'https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?w=300&h=300&fit=crop'],
                        ['id' => 21, 'name' => 'LG OLED TV', 'price' => 189999, 'image' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=300&h=300&fit=crop'],
                        ['id' => 22, 'name' => 'Nintendo Switch OLED', 'price' => 44999, 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'],
                        ['id' => 23, 'name' => 'ASUS ROG Zephyrus', 'price' => 229999, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['id' => 24, 'name' => 'Amazon Echo Show 15', 'price' => 24999, 'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&h=300&fit=crop'],
                    ];
                @endphp
                
                @foreach($electronics as $electronic)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('products.show', $electronic['id']) }}" class="card product-card border-0 shadow-sm text-decoration-none hover-lift">
                        <div class="text-center p-3" style="height: 140px;">
                            <img src="{{ $electronic['image'] }}" 
                                 alt="{{ $electronic['name'] }}" 
                                 class="img-fluid" 
                                 style="max-height: 110px; object-fit: contain;">
                        </div>
                        <div class="card-body p-3 text-center">
                            <h6 class="fw-bold mb-2" style="font-size: 0.85rem;">{{ $electronic['name'] }}</h6>
                            <div class="text-warning small mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="h6 fw-bold text-primary">KES {{ number_format($electronic['price']) }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="accessories-section" class="py-4 bg-white">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="display-5 fw-bold mb-1">
                        <i class="fas fa-headphones text-warning me-2"></i>
                        <span class="text-gradient-cute">Accessories</span>
                    </h2>
                    <p class="text-muted mb-0">Cases, Chargers, Headphones & more</p>
                </div>
                <a href="{{ route('products.index', ['category' => 'accessories']) }}" class="btn btn-outline-warning rounded-pill">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            
            <div class="row g-3">
                @php
                    $accessories = [
                        ['id' => 25, 'name' => 'Bose QuietComfort 45', 'price' => 29999, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                        ['id' => 26, 'name' => 'Apple MagSafe Duo', 'price' => 8999, 'image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop'],
                        ['id' => 27, 'name' => 'Logitech MX Master 3S', 'price' => 12999, 'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=300&h=300&fit=crop'],
                        ['id' => 28, 'name' => 'Samsung Smart Watch 6', 'price' => 39999, 'image' => 'https://images.unsplash.com/photo-1533319417894-6fbb331e5513?w=300&h=300&fit=crop'],
                        ['id' => 29, 'name' => 'Anker PowerCore 26800', 'price' => 7999, 'image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop'],
                        ['id' => 30, 'name' => 'Spigen Phone Case', 'price' => 3499, 'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=300&h=300&fit=crop'],
                    ];
                @endphp
                
                @foreach($accessories as $accessory)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('products.show', $accessory['id']) }}" class="card product-card border-0 shadow-sm text-decoration-none hover-lift">
                        <div class="text-center p-3" style="height: 140px;">
                            <img src="{{ $accessory['image'] }}" 
                                 alt="{{ $accessory['name'] }}" 
                                 class="img-fluid" 
                                 style="max-height: 110px; object-fit: contain;">
                        </div>
                        <div class="card-body p-3 text-center">
                            <h6 class="fw-bold mb-2" style="font-size: 0.85rem;">{{ $accessory['name'] }}</h6>
                            <div class="text-warning small mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="h6 fw-bold text-primary">KES {{ number_format($accessory['price']) }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Banner -->
    <section class="py-4">
        <div class="container py-4">
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="row g-0">
                            <div class="col-md-4 position-relative">
                                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=300&fit=crop" 
                                     alt="Free Delivery" 
                                     class="img-fluid h-100 object-fit-cover">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary bg-opacity-10"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2">
                                            <i class="fas fa-truck text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Free Delivery</h5>
                                    </div>
                                    <p class="text-muted small mb-0">Free next-day delivery for orders above KES 5,000 in Nairobi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rounded-circle bg-success bg-opacity-10 p-2 me-2">
                                            <i class="fas fa-shield-alt text-success"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0">Warranty</h5>
                                    </div>
                                    <p class="text-muted small mb-0">1-year warranty on all electronics with 30-day return policy.</p>
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=300&fit=crop" 
                                     alt="Warranty" 
                                     class="img-fluid h-100 object-fit-cover">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-success bg-opacity-10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-4 bg-dark">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="text-white fw-bold mb-3">Stay Updated with Latest Deals</h3>
                    <p class="text-white-75 mb-4">Subscribe to our newsletter for exclusive offers and product launches</p>
                    
                    <div class="input-group mb-3" style="max-width: 500px; margin: 0 auto;">
                        <input type="email" class="form-control form-control-lg rounded-pill border-0" 
                               placeholder="Enter your email address">
                        <button class="btn btn-primary rounded-pill ms-2 px-4" type="button">
                            Subscribe <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                    
                    <small class="text-white-50">
                        <i class="fas fa-lock me-1"></i> We respect your privacy. Unsubscribe at any time.
                    </small>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    :root {
        --gradient-cute: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .text-gradient-cute {
        background: var(--gradient-cute);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .bg-gradient-cute {
        background: var(--gradient-cute) !important;
    }
    
    /* Category Cards */
    .category-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 15px !important;
        overflow: hidden;
    }
    
    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
    }
    
    /* Product Cards */
    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 10px !important;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    
    /* Cute Animations */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    
    .hover-scale {
        transition: all 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: scale(1.05);
    }
    
    .hover-float {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    /* Blur Effect */
    .blur-15 {
        filter: blur(15px);
    }
    
    /* Sparkle Animation */
    .fa-sparkles {
        animation: sparkle 1.5s infinite;
    }
    
    @keyframes sparkle {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }
    
    /* Card Styles */
    .card {
        border-radius: 10px !important;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    /* Progress Bar */
    .progress {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .progress-bar {
        border-radius: 10px;
    }
    
    /* Responsive Grid */
    @media (max-width: 768px) {
        .display-5 {
            font-size: 2rem;
        }
        
        .btn-lg {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        
        .h4 {
            font-size: 1.25rem;
        }
        
        .category-card {
            margin-bottom: 1rem;
        }
        
        /* Ensure 2 columns on mobile */
        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }
    }
    
    @media (min-width: 768px) {
        /* 4 columns on tablet */
        .col-md-4 {
            flex: 0 0 auto;
            width: 33.33333333%;
        }
    }
    
    @media (min-width: 992px) {
        /* 6 columns on desktop */
        .col-lg-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }
    }
    
    /* Wishlist button animation */
    .wishlist-btn:hover i {
        color: #dc3545;
    }
    
    .wishlist-btn.active i {
        color: #dc3545;
    }
    
    /* Quick cart animation */
    .add-to-cart {
        transition: all 0.3s ease;
    }
    
    .add-to-cart:hover {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Particles.js
        if (typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 30, density: { enable: true, value_area: 800 } },
                    color: { value: "#ffffff" },
                    shape: { type: "circle" },
                    opacity: { value: 0.1, random: true },
                    size: { value: 3, random: true },
                    line_linked: { enable: false },
                    move: { enable: true, speed: 1, direction: "none", random: true }
                }
            });
        }
        
        // Countdown Timer
        function updateCountdown() {
            const hours = document.getElementById('hours');
            const minutes = document.getElementById('minutes');
            const seconds = document.getElementById('seconds');
            
            let h = parseInt(hours.textContent);
            let m = parseInt(minutes.textContent);
            let s = parseInt(seconds.textContent);
            
            s--;
            if (s < 0) {
                s = 59;
                m--;
                if (m < 0) {
                    m = 59;
                    h--;
                    if (h < 0) {
                        h = 23;
                        m = 59;
                        s = 59;
                    }
                }
            }
            
            hours.textContent = h.toString().padStart(2, '0');
            minutes.textContent = m.toString().padStart(2, '0');
            seconds.textContent = s.toString().padStart(2, '0');
        }
        
        setInterval(updateCountdown, 1000);
        
        // Wishlist functionality
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productId = this.getAttribute('data-product-id');
                const icon = this.querySelector('i');
                
                // Toggle wishlist state
                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                    icon.classList.remove('fas', 'fa-heart');
                    icon.classList.add('far', 'fa-heart');
                    
                    // Show notification
                    showNotification('Removed from wishlist', 'info');
                } else {
                    this.classList.add('active');
                    icon.classList.remove('far', 'fa-heart');
                    icon.classList.add('fas', 'fa-heart');
                    
                    // Show notification
                    showNotification('Added to wishlist! ❤️', 'success');
                }
                
                // Send AJAX request (for future implementation)
                // fetch(`/wishlist/${productId}/toggle`, {
                //     method: 'POST',
                //     headers: {
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                //         'Content-Type': 'application/json'
                //     }
                // })
                // .then(response => response.json())
                // .then(data => {
                //     if (data.success) {
                //         showNotification(data.message, 'success');
                //     }
                // });
            });
        });
        
        // Add to Cart functionality
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const productId = this.getAttribute('data-product-id');
                const productCard = this.closest('.card');
                const productName = productCard.querySelector('h6')?.textContent || 'Product';
                const productPrice = productCard.querySelector('.text-primary')?.textContent || '';
                
                // Add to cart animation
                addToCartAnimation(this, productName, productPrice);
                
                // Update cart count
                updateCartCount(1);
                
                // Show notification
                showNotification('Added to cart! 🛒', 'success');
            });
        });
        
        // Add to Cart Animation
        function addToCartAnimation(button, productName, productPrice) {
            const rect = button.getBoundingClientRect();
            const flyItem = document.createElement('div');
            flyItem.className = 'fly-item';
            flyItem.innerHTML = '<i class="fas fa-shopping-cart"></i>';
            flyItem.style.cssText = `
                position: fixed;
                left: ${rect.left + rect.width/2}px;
                top: ${rect.top}px;
                z-index: 9999;
                font-size: 20px;
                color: #667eea;
                pointer-events: none;
                background: white;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            `;
            document.body.appendChild(flyItem);
            
            // Animate to cart icon in header
            const cartIcon = document.querySelector('.fa-shopping-cart');
            if (cartIcon) {
                const cartRect = cartIcon.getBoundingClientRect();
                
                flyItem.animate([
                    { transform: 'translate(0, 0) scale(1)', opacity: 1 },
                    { transform: `translate(${cartRect.left - rect.left}px, ${cartRect.top - rect.top}px) scale(0.3)`, opacity: 0 }
                ], {
                    duration: 800,
                    easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
                }).onfinish = () => {
                    flyItem.remove();
                };
            }
        }
        
        // Update Cart Count
        function updateCartCount(quantity = 1) {
            const cartBadge = document.querySelector('.cart-badge');
            if (cartBadge) {
                let count = parseInt(cartBadge.textContent) || 0;
                count += quantity;
                cartBadge.textContent = count;
                
                // Animate badge
                cartBadge.classList.add('animate__animated', 'animate__bounce');
                setTimeout(() => {
                    cartBadge.classList.remove('animate__animated', 'animate__bounce');
                }, 1000);
            }
        }
        
        // Show Notification
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'success' ? 'success' : type === 'info' ? 'info' : 'warning';
            
            notification.className = `position-fixed top-0 end-0 m-3 p-3 bg-white rounded-3 shadow-lg border-start border-4 border-${bgColor} animate__animated animate__fadeInRight`;
            notification.style.zIndex = '9999';
            notification.style.maxWidth = '300px';
            
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-${bgColor} bg-opacity-10 p-2 me-2">
                        <i class="fas fa-${type === 'success' ? 'check' : 'info-circle'} text-${bgColor}"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-0">${type === 'success' ? 'Success!' : 'Notice'}</h6>
                        <p class="text-muted small mb-0">${message}</p>
                    </div>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove
            setTimeout(() => {
                notification.classList.remove('animate__fadeInRight');
                notification.classList.add('animate__fadeOutRight');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
        
        // Smooth scroll to sections
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Quick view modal (for future implementation)
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Only navigate if not clicking on buttons
                if (!e.target.closest('button') && !e.target.closest('.wishlist-btn')) {
                    // Navigation handled by link
                    return true;
                }
            });
        });
    });
</script>
@endpush