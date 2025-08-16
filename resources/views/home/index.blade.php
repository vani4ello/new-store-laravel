@extends('layouts.shopo')

@section('title', 'Головна - ' . config('app.name'))

@section('content')
<div class="main-container">
    <!-- Hero Banner Section -->
    <div class="hero-banner-section">
        <div class="container">
            <div class="row">
                <!-- Main Banner (Left) -->
                <div class="col-lg-8 col-md-8 mb-4">
                    <div class="hero-banner-main">
                        <div class="banner-content">
                            <div class="banner-info">
                                <div class="banner-badge">NEW RELEASED</div>
                                <h1 class="banner-title">
                                    @if($premiumProduct)
                                        {{ $premiumProduct->name }}
                                    @else
                                        Apple Wireless<br>Samsung S10+
                                    @endif
                                </h1>
                                <div class="banner-prices">
                                    @if($premiumProduct && $premiumProduct->regular_price)
                                        <span class="old-price">{{ $premiumProduct->official_price }}</span>
                                    @endif
                                    @if($premiumProduct && $premiumProduct->store_price)
                                        <span class="new-price">{{ $premiumProduct->store_price }}</span>
                                    @endif
                                </div>
                                <a href="{{ $premiumProduct ? route('products.show', $premiumProduct->slug) : '#' }}" class="btn btn-shop-now">
                                    Shop Now <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="banner-image">
                                <img src="{{ asset('assets/images/product-img-1.jpg') }}" alt="Premium Product" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Banners (Right) -->
                <div class="col-lg-4 col-md-4">
                    <!-- Top Side Banner -->
                    <div class="side-banner top-banner mb-4">
                        <div class="banner-content">
                            <div class="banner-info">
                                <div class="banner-badge gaming">GAMING</div>
                                <h3 class="banner-title">
                                    @if($goldProduct)
                                        {{ $goldProduct->name }}
                                    @else
                                        Apple<br>Smart Watch
                                    @endif
                                </h3>
                                <a href="{{ $goldProduct ? route('products.show', $goldProduct->slug) : '#' }}" class="btn btn-shop-now">
                                    Shop Now <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="banner-image">
                                <img src="{{ asset('assets/images/product-img-2.jpg') }}" alt="Gold Product" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Side Banner -->
                    <div class="side-banner bottom-banner">
                        <div class="banner-content">
                            <div class="banner-info">
                                <div class="banner-badge gaming">GAMING</div>
                                <h3 class="banner-title">
                                    @if($silverProduct)
                                        {{ $silverProduct->name }}
                                    @else
                                        Xbox<br>5th Version
                                    @endif
                                </h3>
                                <a href="{{ $silverProduct ? route('products.show', $silverProduct->slug) : '#' }}" class="btn btn-shop-now">
                                    Shop Now <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="banner-image">
                                <img src="{{ asset('assets/images/product-img-3.jpg') }}" alt="Silver Product" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center">Чому обирають нас?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <h4 class="feature-title">Безкоштовна доставка</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-gamepad"></i>
                        </div>
                        <h4 class="feature-title">Цифрові товари</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-steam"></i>
                        </div>
                        <h4 class="feature-title">Автоматичні Стім коди</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h4 class="feature-title">Secure Payment</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-tags"></i>
                        </div>
                        <h4 class="feature-title">Cheap Prices</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Selling Products -->
    @if($topSellingProducts->count() > 0)
    <div class="products-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center">Top Selling Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach($topSellingProducts as $product)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/images/product-img-' . ($loop->index + 1) . '.jpg') }}" alt="{{ $product->name }}" class="img-fluid">
                            @if($product->discount_percentage)
                                <div class="discount-badge">-{{ $product->discount_percentage }}%</div>
                            @endif
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">{{ $product->name }}</h4>
                            <div class="product-prices">
                                @if($product->regular_price)
                                    <span class="old-price">{{ $product->official_price }}</span>
                                @endif
                                @if($product->store_price)
                                    <span class="new-price">{{ $product->store_price }}</span>
                                @endif
                            </div>
                            <div class="product-actions">
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary btn-sm">Деталі</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- New Arrivals -->
    @if($newArrivals->count() > 0)
    <div class="products-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center">New Arrivals</h2>
                </div>
            </div>
            <div class="row">
                @foreach($newArrivals as $product)
                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/images/product-img-' . ($loop->index + 1) . '.jpg') }}" alt="{{ $product->name }}" class="img-fluid">
                            @if($product->discount_percentage)
                                <div class="discount-badge">-{{ $product->discount_percentage }}%</div>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <div class="product-prices">
                                @if($product->regular_price)
                                    <span class="old-price">{{ $product->official_price }}</span>
                                @endif
                                @if($product->store_price)
                                    <span class="new-price">{{ $product->store_price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

<style>
/* Hero Banner Section */
.hero-banner-section {
    padding: 4rem 0;
    background: #f8f9fa;
}

/* Main Banner Styles */
.hero-banner-main {
    background: linear-gradient(135deg, #ff6b9d 0%, #ff8fab 100%);
    border-radius: 20px;
    padding: 3rem;
    color: white;
    min-height: 500px;
    position: relative;
    overflow: hidden;
}

.hero-banner-main::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.banner-badge {
    display: inline-block;
    background: #333;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.banner-badge.gaming {
    background: #ffd700;
    color: #333;
}

.banner-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero-banner-main .banner-title {
    font-size: 3.5rem;
}

.banner-prices {
    margin-bottom: 2rem;
}

.old-price {
    text-decoration: line-through;
    opacity: 0.7;
    margin-right: 1.5rem;
    font-size: 1.3rem;
}

.new-price {
    font-weight: 700;
    font-size: 1.6rem;
}

.hero-banner-main .new-price {
    font-size: 2rem;
}

.btn-shop-now {
    background: white;
    color: #333;
    border: none;
    padding: 1.25rem 2.5rem;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.1rem;
}

.btn-shop-now:hover {
    background: #f8f9fa;
    color: #333;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.banner-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
    position: relative;
    z-index: 1;
}

.banner-info {
    flex: 1;
    padding-right: 2rem;
}

.banner-image {
    flex: 0 0 300px;
    text-align: center;
}

.banner-image img {
    border-radius: 20px;
    max-width: 100%;
    height: auto;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

/* Side Banner Styles */
.side-banner {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    min-height: 250px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
    margin-bottom: 1.5rem;
}

.side-banner:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.top-banner {
    background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
    color: white;
}

.bottom-banner {
    background: white;
    color: #333;
}

.side-banner .banner-content {
    flex-direction: column;
    text-align: center;
    height: auto;
}

.side-banner .banner-title {
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    line-height: 1.3;
}

.side-banner .banner-image {
    flex: none;
    margin-top: 1.5rem;
}

.side-banner .banner-image img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 15px;
}

/* Features Section */
.features-section {
    padding: 5rem 0;
    background: white;
}

.section-title {
    font-size: 3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 4rem;
}

.feature-card {
    text-align: center;
    padding: 2rem 1.5rem;
    background: #f8f9fa;
    border-radius: 15px;
    height: 100%;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.15);
}

.feature-icon {
    font-size: 3rem;
    color: #604bfe;
    margin-bottom: 1.5rem;
}

.feature-title {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
    line-height: 1.4;
}

/* Products Section */
.products-section {
    padding: 5rem 0;
    background: #f8f9fa;
}

.product-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.product-image {
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.product-image .discount-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ff4757;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
}

.product-info {
    padding: 1.5rem;
}

.product-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.product-prices {
    margin-bottom: 1.5rem;
}

.product-prices .old-price {
    color: #999;
    font-size: 1rem;
}

.product-prices .new-price {
    color: #604bfe;
    font-weight: 700;
    font-size: 1.2rem;
}

.product-actions {
    text-align: center;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
    cursor: pointer;
}

.btn-sm {
    padding: 0.5rem 1.25rem;
    font-size: 0.9rem;
}

.btn-primary {
    background: #604bfe;
    color: white;
    border: 2px solid #604bfe;
}

.btn-primary:hover {
    background: #4a3fd8;
    border-color: #4a3fd8;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(96, 75, 254, 0.3);
}

@media (max-width: 768px) {
    .hero-banner-main {
        padding: 2rem;
        min-height: 400px;
    }
    
    .banner-title {
        font-size: 2.5rem;
    }
    
    .hero-banner-main .banner-title {
        font-size: 3rem;
    }
    
    .banner-content {
        flex-direction: column;
        text-align: center;
    }
    
    .banner-info {
        padding-right: 0;
        margin-bottom: 2rem;
    }
    
    .banner-image {
        margin-top: 1rem;
        flex: none;
    }
    
    .side-banner {
        margin-bottom: 1.5rem;
        min-height: 200px;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .feature-title {
        font-size: 0.9rem;
    }
    
    .hero-banner-section {
        padding: 2rem 0;
    }
    
    .features-section,
    .products-section {
        padding: 3rem 0;
    }
}
</style>
@endsection
