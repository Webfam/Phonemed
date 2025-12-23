@extends('layouts.app')

@section('title', $categoryData['name'])

@section('content')
<div class="container-fluid py-4">
    <!-- Category Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="h2 fw-bold mb-2">{{ $categoryData['name'] }}</h1>
                            <p class="text-muted mb-0">{{ $categoryData['description'] }}</p>
                            <div class="mt-2">
                                <span class="badge bg-primary">
                                    {{ count($categoryData['products']) }} Products
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="input-group" style="max-width: 300px; margin-left: auto;">
                                <input type="text" class="form-control" placeholder="Search in {{ $categoryData['name'] }}">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid - 6 per row -->
    <div class="row g-3 mb-5">
        @foreach($categoryData['products'] as $product)
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('products.show', $product['id']) }}" class="card product-card border-0 shadow-sm text-decoration-none hover-lift">
                <div class="position-relative">
                    <!-- Product Image -->
                    <div class="text-center p-3" style="height: 140px;">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="img-fluid" 
                             style="max-height: 110px; object-fit: contain;">
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="card-body p-3 text-center">
                    <h6 class="fw-bold mb-2" style="font-size: 0.85rem;">{{ $product['name'] }}</h6>
                    <div class="text-warning small mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="h6 fw-bold text-primary">KES {{ number_format($product['price']) }}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Category Description -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="fw-bold mb-3">About {{ $categoryData['name'] }}</h4>
                    @if($category == 'phones')
                    <p>
                        Discover the latest smartphones from top brands like Apple, Samsung, Google, 
                        and more. Our phone collection features cutting-edge technology, stunning 
                        displays, powerful cameras, and long-lasting battery life. Whether you're 
                        looking for flagship devices or budget-friendly options, we have the perfect 
                        phone for your needs.
                    </p>
                    @elseif($category == 'electronics')
                    <p>
                        Explore our wide range of electronics including laptops, tablets, gaming 
                        consoles, smart home devices, and televisions. We offer premium brands 
                        with the latest technology to enhance your digital lifestyle. From work 
                        to entertainment, find the perfect electronic device for every occasion.
                    </p>
                    @else
                    <p>
                        Complete your tech setup with our premium accessories collection. From 
                        wireless headphones and smartwatches to phone cases and chargers, we 
                        have everything you need to enhance your device experience. All our 
                        accessories are designed to complement your tech lifestyle.
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection