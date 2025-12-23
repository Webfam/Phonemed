@extends('layouts.app')

@section('title', 'All Products')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h2 fw-bold">All Products</h1>
            <p class="text-muted">Browse our complete collection</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option value="">All Categories</option>
                                <option value="phones">Phones</option>
                                <option value="electronics">Electronics</option>
                                <option value="accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price Range</label>
                            <select class="form-select">
                                <option value="">All Prices</option>
                                <option value="0-50000">Under KES 50,000</option>
                                <option value="50000-100000">KES 50,000 - 100,000</option>
                                <option value="100000-200000">KES 100,000 - 200,000</option>
                                <option value="200000+">Over KES 200,000</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sort By</label>
                            <select class="form-select">
                                <option value="newest">Newest First</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="rating">Highest Rated</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-primary w-100">
                                <i class="fas fa-filter me-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @for($i = 1; $i <= 12; $i++)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card product-card border-0 shadow-sm h-100 hover-lift">
                <div class="position-relative">
                    <!-- Badge -->
                    @if($i <= 3)
                    <div class="position-absolute top-0 start-0 m-2">
                        <span class="badge bg-danger px-2 py-1">NEW</span>
                    </div>
                    @endif
                    
                    <!-- Wishlist Button -->
                    <div class="position-absolute top-0 end-0 m-2">
                        <button class="btn btn-sm btn-light rounded-circle wishlist-btn" 
                                style="width: 28px; height: 28px;">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                    
                    <!-- Product Image -->
                    <div class="text-center p-3" style="height: 180px;">
                        <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop" 
                             alt="Product {{ $i }}" 
                             class="img-fluid" 
                             style="max-height: 140px; object-fit: contain;">
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="card-body p-3">
                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                        <i class="fas fa-tag me-1"></i> Electronics
                    </small>
                    <h6 class="fw-bold mb-2" style="font-size: 0.9rem; line-height: 1.3;">
                        Product Name {{ $i }} - Premium Edition with Extra Features
                    </h6>
                    
                    <!-- Rating -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-warning me-1 small">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <small class="text-muted ms-1">4.5</small>
                    </div>
                    
                    <!-- Price -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="h6 fw-bold text-primary mb-0">
                            KES {{ number_format(rand(10000, 200000)) }}
                        </span>
                        <button class="btn btn-primary btn-sm rounded-circle add-to-cart" 
                                data-product-id="{{ $i }}"
                                style="width: 32px; height: 32px;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add to cart functionality
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                
                // Show notification
                showNotification('Added to cart! 🛒', 'success');
                
                // Update cart count
                updateCartCount(1);
            });
        });
        
        // Wishlist functionality
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    showNotification('Added to wishlist! ❤️', 'success');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    showNotification('Removed from wishlist', 'info');
                }
            });
        });
    });
</script>
@endpush