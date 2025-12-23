@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <!-- Main Image -->
                    <div class="text-center mb-4">
                        <div class="position-relative" style="height: 400px;">
                            <img id="mainImage" 
                                 src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=800&fit=crop" 
                                 alt="iPhone 15 Pro" 
                                 class="img-fluid h-100" 
                                 style="object-fit: contain;">
                            
                            <!-- Image Zoom -->
                            <div class="position-absolute top-0 end-0 m-3">
                                <button class="btn btn-light btn-sm rounded-circle" 
                                        onclick="toggleZoom()"
                                        style="width: 40px; height: 40px;">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                            
                            <!-- Sale Badge -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-danger px-3 py-2 fs-6">
                                    -20% OFF
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Gallery -->
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="image-thumbnail active" 
                                 onclick="changeImage('https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=800&fit=crop')">
                                <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=200&h=200&fit=crop" 
                                     alt="Front View" 
                                     class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="image-thumbnail" 
                                 onclick="changeImage('https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=800&h=800&fit=crop')">
                                <img src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=200&h=200&fit=crop" 
                                     alt="Back View" 
                                     class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="image-thumbnail" 
                                 onclick="changeImage('https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=800&fit=crop')">
                                <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=200&h=200&fit=crop" 
                                     alt="Side View" 
                                     class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="image-thumbnail" 
                                 onclick="changeImage('https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?w=800&h=800&fit=crop')">
                                <img src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?w=200&h=200&fit=crop" 
                                     alt="Accessories" 
                                     class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="sticky-top" style="top: 20px;">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Product Title -->
                        <h1 class="h2 fw-bold mb-2">iPhone 15 Pro</h1>
                        
                        <!-- Category & Brand -->
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">Phones</span>
                            <span class="badge bg-secondary">Apple</span>
                            <div class="ms-auto">
                                <button class="btn btn-outline-danger btn-sm" id="wishlistBtn">
                                    <i class="far fa-heart"></i> Wishlist
                                </button>
                            </div>
                        </div>
                        
                        <!-- Product Codes -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="bg-light rounded p-2">
                                    <small class="text-muted d-block">SKU</small>
                                    <span class="fw-semibold">IPH15P-256-BLK</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded p-2">
                                    <small class="text-muted d-block">Barcode</small>
                                    <span class="fw-semibold">885909951234</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Rating -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-muted me-2">4.8/5</span>
                            <span class="text-muted">(1,247 reviews)</span>
                        </div>
                        
                        <!-- Price -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <span class="h2 fw-bold text-primary me-3">KES 189,999</span>
                                <span class="h5 text-muted text-decoration-line-through">KES 229,999</span>
                                <span class="badge bg-danger ms-2 fs-6">Save KES 40,000</span>
                            </div>
                            <small class="text-success">
                                <i class="fas fa-bolt me-1"></i> Price includes 16% VAT
                            </small>
                        </div>
                        
                        <!-- Availability -->
                        <div class="alert alert-success mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2 fs-5"></i>
                                <div>
                                    <strong>In Stock</strong>
                                    <div class="text-muted small">Available: 42 units</div>
                                    <div class="progress mt-1" style="height: 5px;">
                                        <div class="progress-bar bg-success" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Variants -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2">Color</h6>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-dark active">Black Titanium</button>
                                <button class="btn btn-sm btn-outline-secondary">White Titanium</button>
                                <button class="btn btn-sm btn-outline-primary">Blue Titanium</button>
                                <button class="btn btn-sm btn-outline-danger">Natural Titanium</button>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2">Storage</h6>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary">128GB</button>
                                <button class="btn btn-sm btn-outline-dark active">256GB</button>
                                <button class="btn btn-sm btn-outline-secondary">512GB</button>
                                <button class="btn btn-sm btn-outline-secondary">1TB</button>
                            </div>
                        </div>
                        
                        <!-- Quantity -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2">Quantity</h6>
                            <div class="d-flex align-items-center" style="max-width: 150px;">
                                <button class="btn btn-outline-secondary" onclick="updateQuantity(-1)">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" 
                                       class="form-control text-center mx-2" 
                                       id="quantity" 
                                       value="1" 
                                       min="1" 
                                       max="42">
                                <button class="btn btn-outline-secondary" onclick="updateQuantity(1)">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Warranty -->
                        <div class="alert alert-info mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt me-2 fs-5"></i>
                                <div>
                                    <strong>1 Year Warranty</strong>
                                    <div class="text-muted small">Covers manufacturing defects</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-primary btn-lg py-3" id="addToCartBtn">
                                <i class="fas fa-cart-plus me-2"></i> Add to Cart
                            </button>
                            <button class="btn btn-success btn-lg py-3" id="buyNowBtn">
                                <i class="fas fa-bolt me-2"></i> Buy Now
                            </button>
                        </div>
                        
                        <!-- Delivery Info -->
                        <div class="row g-2 text-center mb-4">
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <i class="fas fa-truck text-primary mb-1"></i>
                                    <div class="small">Free Delivery</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <i class="fas fa-exchange-alt text-success mb-1"></i>
                                    <div class="small">30-Day Returns</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2">
                                    <i class="fas fa-credit-card text-warning mb-1"></i>
                                    <div class="small">Secure Payment</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">
                                <i class="fas fa-info-circle me-2"></i>Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button">
                                <i class="fas fa-list-alt me-2"></i>Specifications
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                                <i class="fas fa-star me-2"></i>Reviews (1,247)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="warranty-tab" data-bs-toggle="tab" data-bs-target="#warranty" type="button">
                                <i class="fas fa-shield-alt me-2"></i>Warranty
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Tabs Content -->
                    <div class="tab-content p-4" id="productTabsContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <h4 class="fw-bold mb-3">iPhone 15 Pro - The Ultimate Smartphone Experience</h4>
                            <p class="mb-4">
                                Experience the pinnacle of smartphone technology with the iPhone 15 Pro. 
                                Featuring a stunning 6.1-inch Super Retina XDR display with ProMotion 
                                technology, the A17 Pro chip for unprecedented performance, and a 
                                revolutionary camera system that captures incredible photos and videos 
                                in any light.
                            </p>
                            
                            <h5 class="fw-bold mb-3">Key Features</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            A17 Pro chip with 6-core CPU
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            48MP Main camera with quad-pixel sensor
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            ProMotion technology with 120Hz refresh rate
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Titanium design with textured matte glass back
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            USB-C for faster data transfer
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            All-day battery life (up to 29 hours video)
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            5G connectivity for superfast downloads
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            iOS 17 with advanced privacy features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <h5 class="fw-bold mb-3">In the Box</h5>
                                <div class="d-flex flex-wrap gap-3">
                                    <span class="badge bg-light text-dark p-2">iPhone 15 Pro</span>
                                    <span class="badge bg-light text-dark p-2">USB-C Cable</span>
                                    <span class="badge bg-light text-dark p-2">Documentation</span>
                                    <span class="badge bg-light text-dark p-2">Apple Logo Sticker</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Specifications Tab -->
                        <div class="tab-pane fade" id="specs" role="tabpanel">
                            <h4 class="fw-bold mb-3">Technical Specifications</h4>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">General</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="30%"><strong>Model</strong></td>
                                            <td>iPhone 15 Pro</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Release Date</strong></td>
                                            <td>September 2023</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dimensions</strong></td>
                                            <td>146.6 x 70.6 x 8.25 mm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Weight</strong></td>
                                            <td>187 grams</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Build</strong></td>
                                            <td>Titanium frame, textured matte glass back</td>
                                        </tr>
                                    </tbody>
                                    
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">Display</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Size</strong></td>
                                            <td>6.1 inches</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Type</strong></td>
                                            <td>Super Retina XDR OLED</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Resolution</strong></td>
                                            <td>2556 x 1179 pixels</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Refresh Rate</strong></td>
                                            <td>120Hz ProMotion</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Brightness</strong></td>
                                            <td>2000 nits peak (HDR)</td>
                                        </tr>
                                    </tbody>
                                    
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">Camera</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Main Camera</strong></td>
                                            <td>48MP, f/1.78 aperture</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ultra Wide</strong></td>
                                            <td>12MP, f/2.2 aperture</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telephoto</strong></td>
                                            <td>12MP, 3x optical zoom</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Front Camera</strong></td>
                                            <td>12MP, f/1.9 aperture</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Video Recording</strong></td>
                                            <td>4K at 60 fps, ProRes support</td>
                                        </tr>
                                    </tbody>
                                    
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Chipset</strong></td>
                                            <td>A17 Pro (3nm)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CPU</strong></td>
                                            <td>6-core (2 performance + 4 efficiency)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>GPU</strong></td>
                                            <td>6-core Apple GPU</td>
                                        </tr>
                                        <tr>
                                            <td><strong>RAM</strong></td>
                                            <td>8GB</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Storage</strong></td>
                                            <td>256GB (NVMe)</td>
                                        </tr>
                                    </tbody>
                                    
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="2" class="bg-primary text-white">Battery & Charging</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Capacity</strong></td>
                                            <td>3274 mAh</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Battery Life</strong></td>
                                            <td>Up to 29 hours video playback</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Charging</strong></td>
                                            <td>USB-C, 20W fast charging</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Wireless Charging</strong></td>
                                            <td>MagSafe, Qi2 compatible</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Average Rating -->
                                    <div class="text-center mb-4">
                                        <div class="display-4 fw-bold text-primary">4.8</div>
                                        <div class="text-warning mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <div class="text-muted">1,247 reviews</div>
                                    </div>
                                    
                                    <!-- Rating Breakdown -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <small>5 stars</small>
                                            <div class="progress flex-grow-1 mx-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 75%"></div>
                                            </div>
                                            <small>75%</small>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <small>4 stars</small>
                                            <div class="progress flex-grow-1 mx-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 18%"></div>
                                            </div>
                                            <small>18%</small>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <small>3 stars</small>
                                            <div class="progress flex-grow-1 mx-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 5%"></div>
                                            </div>
                                            <small>5%</small>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <small>2 stars</small>
                                            <div class="progress flex-grow-1 mx-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 1%"></div>
                                            </div>
                                            <small>1%</small>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <small>1 star</small>
                                            <div class="progress flex-grow-1 mx-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 1%"></div>
                                            </div>
                                            <small>1%</small>
                                        </div>
                                    </div>
                                    
                                    <!-- Write Review Button -->
                                    <button class="btn btn-primary w-100 mb-4" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                        <i class="fas fa-pen me-2"></i> Write a Review
                                    </button>
                                </div>
                                
                                <div class="col-md-8">
                                    <!-- Review List -->
                                    <div class="review-list">
                                        <!-- Review 1 -->
                                        <div class="review-item mb-4 pb-4 border-bottom">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div>
                                                    <strong>John D.</strong>
                                                    <div class="text-warning small">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <small class="text-muted">2 days ago</small>
                                            </div>
                                            <h6 class="fw-bold">Best iPhone Ever!</h6>
                                            <p class="mb-2">
                                                The iPhone 15 Pro is absolutely incredible. The titanium 
                                                build feels premium, battery life is amazing, and the 
                                                camera system produces stunning photos.
                                            </p>
                                            <div class="text-muted small">
                                                <i class="fas fa-check-circle text-success me-1"></i>
                                                Verified Purchase
                                            </div>
                                        </div>
                                        
                                        <!-- Review 2 -->
                                        <div class="review-item mb-4 pb-4 border-bottom">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div>
                                                    <strong>Sarah M.</strong>
                                                    <div class="text-warning small">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <small class="text-muted">1 week ago</small>
                                            </div>
                                            <h6 class="fw-bold">Great but heavy</h6>
                                            <p class="mb-2">
                                                Amazing performance and display, but it's heavier than 
                                                my previous iPhone. The USB-C is a welcome change though!
                                            </p>
                                            <div class="text-muted small">
                                                <i class="fas fa-check-circle text-success me-1"></i>
                                                Verified Purchase
                                            </div>
                                        </div>
                                        
                                        <!-- Review 3 -->
                                        <div class="review-item mb-4">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div>
                                                    <strong>Michael T.</strong>
                                                    <div class="text-warning small">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                                </div>
                                                <small class="text-muted">2 weeks ago</small>
                                            </div>
                                            <h6 class="fw-bold">Excellent upgrade</h6>
                                            <p class="mb-2">
                                                Upgraded from iPhone 12 Pro. The difference is night and 
                                                day. Performance, camera, battery - everything is better.
                                            </p>
                                            <div class="text-muted small">
                                                <i class="fas fa-check-circle text-success me-1"></i>
                                                Verified Purchase
                                            </div>
                                        </div>
                                        
                                        <!-- Load More -->
                                        <div class="text-center">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-arrow-down me-2"></i> Load More Reviews
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Warranty Tab -->
                        <div class="tab-pane fade" id="warranty" role="tabpanel">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="fw-bold mb-3">Product Warranty Information</h4>
                                    
                                    <div class="alert alert-info">
                                        <h5 class="alert-heading">
                                            <i class="fas fa-shield-alt me-2"></i>
                                            1-Year Limited Warranty
                                        </h5>
                                        <p class="mb-0">
                                            Your iPhone 15 Pro comes with a 1-year limited warranty 
                                            covering manufacturing defects and hardware failures.
                                        </p>
                                    </div>
                                    
                                    <h5 class="fw-bold mt-4 mb-3">What's Covered</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Manufacturing defects in materials and workmanship
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Hardware component failures
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Battery capacity below 80% within 1 year
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Accessories included in the original packaging
                                        </li>
                                    </ul>
                                    
                                    <h5 class="fw-bold mt-4 mb-3">What's Not Covered</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-times text-danger me-2"></i>
                                            Accidental damage (drops, liquid damage)
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-times text-danger me-2"></i>
                                            Cosmetic damage (scratches, dents)
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-times text-danger me-2"></i>
                                            Damage caused by unauthorized modifications
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-times text-danger me-2"></i>
                                            Normal wear and tear
                                        </li>
                                    </ul>
                                    
                                    <h5 class="fw-bold mt-4 mb-3">Warranty Claim Process</h5>
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="p-3 border rounded">
                                                <div class="fs-1 text-primary">1</div>
                                                <strong>Contact Support</strong>
                                                <p class="small mb-0">Call or email our support team</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-3 border rounded">
                                                <div class="fs-1 text-primary">2</div>
                                                <strong>Diagnosis</strong>
                                                <p class="small mb-0">We'll diagnose the issue remotely</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-3 border rounded">
                                                <div class="fs-1 text-primary">3</div>
                                                <strong>Repair/Replace</strong>
                                                <p class="small mb-0">We repair or replace your device</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="fw-bold mb-3">
                                                <i class="fas fa-headset me-2"></i>
                                                Support Center
                                            </h5>
                                            <div class="mb-3">
                                                <strong>Phone Support</strong>
                                                <div class="text-muted">+254 700 123 456</div>
                                                <small>Mon-Fri 8AM-6PM</small>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Email Support</strong>
                                                <div class="text-muted">support@techstore.com</div>
                                                <small>24/7 Response</small>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Live Chat</strong>
                                                <div class="text-muted">Available 24/7</div>
                                            </div>
                                            <button class="btn btn-primary w-100">
                                                <i class="fas fa-comment me-2"></i> Start Live Chat
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="card border-0 shadow-sm mt-3">
                                        <div class="card-body">
                                            <h5 class="fw-bold mb-3">
                                                <i class="fas fa-file-contract me-2"></i>
                                                Warranty Registration
                                            </h5>
                                            <p class="small text-muted">
                                                Register your product to activate your warranty and 
                                                receive important updates.
                                            </p>
                                            <button class="btn btn-outline-primary w-100">
                                                <i class="fas fa-clipboard-check me-2"></i> Register Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="fw-bold mb-4">Related Products</h3>
            <div class="row g-3">
                @for($i = 1; $i <= 6; $i++)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card product-card border-0 shadow-sm hover-lift">
                        <div class="position-relative">
                            <!-- Badge -->
                            @if($i == 1)
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-danger px-2 py-1">NEW</span>
                            </div>
                            @endif
                            
                            <!-- Wishlist Button -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <button class="btn btn-sm btn-light rounded-circle" 
                                        style="width: 28px; height: 28px;">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            
                            <!-- Product Image -->
                            <div class="text-center p-3" style="height: 140px;">
                                @if($i == 1)
                                <img src="https://images.unsplash.com/photo-1592910147751-9c771e79e6e8?w=300&h=300&fit=crop" 
                                     alt="Google Pixel 8" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @elseif($i == 2)
                                <img src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300&h=300&fit=crop" 
                                     alt="Samsung S24" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @elseif($i == 3)
                                <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&h=300&fit=crop" 
                                     alt="OnePlus 12" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @elseif($i == 4)
                                <img src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=300&h=300&fit=crop" 
                                     alt="AirPods Pro" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @elseif($i == 5)
                                <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=300&fit=crop" 
                                     alt="MagSafe Charger" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @else
                                <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=300&h=300&fit=crop" 
                                     alt="Phone Case" 
                                     class="img-fluid" 
                                     style="max-height: 110px; object-fit: contain;">
                                @endif
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-2" style="font-size: 0.9rem;">
                                @if($i == 1) Google Pixel 8
                                @elseif($i == 2) Samsung Galaxy S24
                                @elseif($i == 3) OnePlus 12
                                @elseif($i == 4) AirPods Pro 2
                                @elseif($i == 5) Apple MagSafe
                                @else iPhone 15 Pro Case
                                @endif
                            </h6>
                            <div class="text-warning small mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h6 fw-bold text-primary mb-0">
                                    KES @if($i == 1)119,999 @elseif($i == 2)149,999 @elseif($i == 3)94,999 @elseif($i == 4)29,999 @elseif($i == 5)8,999 @else3,499 @endif
                                </span>
                                <button class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-plus" style="font-size: 0.7rem;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="rating-stars">
                        <i class="far fa-star fa-2x" data-rating="1"></i>
                        <i class="far fa-star fa-2x" data-rating="2"></i>
                        <i class="far fa-star fa-2x" data-rating="3"></i>
                        <i class="far fa-star fa-2x" data-rating="4"></i>
                        <i class="far fa-star fa-2x" data-rating="5"></i>
                    </div>
                    <input type="hidden" id="ratingValue" value="0">
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" placeholder="Summarize your experience">
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Review</label>
                    <textarea class="form-control" rows="4" placeholder="Share your thoughts about this product"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Submit Review</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Zoom Modal -->
<div class="modal fade" id="imageZoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center">
                <img id="zoomedImage" src="" alt="" class="img-fluid">
                <button type="button" class="btn btn-light position-absolute top-0 end-0 m-3" 
                        data-bs-dismiss="modal" style="z-index: 1;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Product Detail Styles */
    .image-thumbnail {
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 8px;
        padding: 2px;
        transition: all 0.3s ease;
    }
    
    .image-thumbnail:hover,
    .image-thumbnail.active {
        border-color: #667eea;
    }
    
    /* Sticky Add to Cart */
    .sticky-top {
        z-index: 1020;
    }
    
    /* Tabs Styling */
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 1rem 1.5rem;
    }
    
    .nav-tabs .nav-link.active {
        color: #667eea;
        border-bottom: 3px solid #667eea;
        background-color: transparent;
    }
    
    /* Rating Stars */
    .rating-stars {
        color: #ffc107;
        cursor: pointer;
    }
    
    .rating-stars i {
        margin-right: 5px;
    }
    
    .rating-stars i:hover,
    .rating-stars i:hover ~ i {
        color: #ffc107;
    }
    
    /* Review Items */
    .review-item {
        transition: all 0.3s ease;
    }
    
    .review-item:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin: -1rem;
    }
    
    /* Related Products */
    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    /* Quantity Input */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    /* Image Zoom */
    #imageZoomModal .modal-content {
        background-color: rgba(0,0,0,0.8);
    }
    
    /* Warranty Cards */
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    /* Badge Styles */
    .badge {
        font-weight: 500;
    }
    
    /* Table Styles */
    table tr td:first-child {
        background-color: #f8f9fa;
    }
    
    /* Progress Bar */
    .progress {
        background-color: #e9ecef;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .h2 {
            font-size: 1.5rem;
        }
        
        .sticky-top {
            position: static !important;
        }
        
        .image-thumbnail img {
            height: 60px;
            object-fit: cover;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image Gallery
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
            document.getElementById('zoomedImage').src = src;
            
            // Update active thumbnail
            document.querySelectorAll('.image-thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            event.target.closest('.image-thumbnail').classList.add('active');
        }
        
        // Image Zoom
        function toggleZoom() {
            const modal = new bootstrap.Modal(document.getElementById('imageZoomModal'));
            modal.show();
        }
        
        // Quantity Controls
        function updateQuantity(change) {
            const input = document.getElementById('quantity');
            let value = parseInt(input.value) + change;
            
            if (value < 1) value = 1;
            if (value > 42) value = 42; // Max stock
            
            input.value = value;
        }
        
        // Wishlist Toggle
        document.getElementById('wishlistBtn').addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.classList.remove('btn-outline-danger');
                this.classList.add('btn-danger');
                showNotification('Added to wishlist! ❤️', 'success');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.classList.remove('btn-danger');
                this.classList.add('btn-outline-danger');
                showNotification('Removed from wishlist', 'info');
            }
        });
        
        // Add to Cart
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            const quantity = document.getElementById('quantity').value;
            const productName = 'iPhone 15 Pro';
            const price = 'KES 189,999';
            
            // Add to cart animation
            addToCartAnimation(this, productName, price);
            
            // Update cart count
            updateCartCount(parseInt(quantity));
            
            // Show notification
            showNotification(`${quantity}x ${productName} added to cart! 🛒`, 'success');
        });
        
        // Buy Now
        document.getElementById('buyNowBtn').addEventListener('click', function() {
            const quantity = document.getElementById('quantity').value;
            
            // Redirect to checkout (simulated)
            showNotification(`Redirecting to checkout with ${quantity} item(s)...`, 'info');
            
            setTimeout(() => {
                // In real app: window.location.href = '/checkout';
                console.log('Proceed to checkout');
            }, 1000);
        });
        
        // Rating Stars (Review Modal)
        document.querySelectorAll('.rating-stars i').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                document.getElementById('ratingValue').value = rating;
                
                // Update stars display
                document.querySelectorAll('.rating-stars i').forEach(s => {
                    const starRating = s.getAttribute('data-rating');
                    
                    if (starRating <= rating) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    } else {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });
            });
        });
        
        // Variant Selection
        document.querySelectorAll('.btn-outline-dark, .btn-outline-secondary, .btn-outline-primary, .btn-outline-danger').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from siblings
                this.parentElement.querySelectorAll('button').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('btn-outline-secondary');
                    b.classList.remove('btn-dark', 'btn-secondary', 'btn-primary', 'btn-danger');
                });
                
                // Add active class to clicked button
                this.classList.remove('btn-outline-secondary');
                this.classList.add('active');
                
                // Determine which variant button type this is
                if (this.textContent.includes('Black')) {
                    this.classList.add('btn-dark');
                } else if (this.textContent.includes('White')) {
                    this.classList.add('btn-secondary');
                } else if (this.textContent.includes('Blue')) {
                    this.classList.add('btn-primary');
                } else if (this.textContent.includes('Natural')) {
                    this.classList.add('btn-danger');
                } else if (this.textContent.includes('256GB')) {
                    this.classList.add('btn-dark');
                }
            });
        });
        
        // Sticky Add to Cart for mobile
        function handleStickyCart() {
            const cartSection = document.querySelector('.sticky-top');
            const footer = document.querySelector('footer');
            
            if (window.innerWidth < 992) {
                let lastScrollTop = 0;
                
                window.addEventListener('scroll', function() {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    if (scrollTop > lastScrollTop) {
                        // Scrolling down
                        cartSection.style.position = 'fixed';
                        cartSection.style.bottom = '0';
                        cartSection.style.width = '100%';
                        cartSection.style.zIndex = '1040';
                        cartSection.style.background = 'white';
                        cartSection.style.boxShadow = '0 -2px 10px rgba(0,0,0,0.1)';
                        
                        // Adjust footer margin
                        if (footer) {
                            footer.style.marginBottom = cartSection.offsetHeight + 'px';
                        }
                    } else {
                        // Scrolling up
                        cartSection.style.position = 'static';
                        cartSection.style.boxShadow = 'none';
                        
                        // Reset footer margin
                        if (footer) {
                            footer.style.marginBottom = '0';
                        }
                    }
                    
                    lastScrollTop = scrollTop;
                });
            }
        }
        
        // Initialize sticky cart
        handleStickyCart();
        
        // Helper Functions
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
        
        // Handle quantity input changes
        document.getElementById('quantity').addEventListener('change', function() {
            let value = parseInt(this.value);
            
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > 42) {
                this.value = 42;
                showNotification('Maximum quantity available is 42', 'warning');
            }
        });
        
        // Tab functionality
        const triggerTabList = document.querySelectorAll('#productTabs button');
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl);
            
            triggerEl.addEventListener('click', event => {
                event.preventDefault();
                tabTrigger.show();
            });
        });
    });
</script>
@endpush