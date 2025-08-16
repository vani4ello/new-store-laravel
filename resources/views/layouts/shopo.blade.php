<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', config('app.name', 'New-Store'))</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="shortcut icon"
      type="image/png"
      href="{{ asset('assets/images/favicon.png') }}"
    />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>

  <body>
    <!-- Header Area -->
    <div class="header-area">
      <div class="container">
        <div class="row align-items-center">
          <!-- Logo -->
          <div class="col-lg-3 col-md-3">
            <div class="logo">
              <a href="{{ route('home') }}">
                <h2><i class="fa fa-shopping-bag"></i> {{ config('app.name', 'ShopO') }}</h2>
              </a>
            </div>
          </div>
          
          <!-- Search Bar -->
          <div class="col-lg-6 col-md-6">
            <div class="search-bar">
              <form class="search-form">
                <div class="input-group">
                  <select class="form-control category-select">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Gaming</option>
                    <option>Fashion</option>
                  </select>
                  <input type="text" class="form-control" placeholder="Search Product...">
                  <button class="btn btn-search" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          
          <!-- User Icons -->
          <div class="col-lg-3 col-md-3">
            <div class="user-actions">
              <a href="#" class="action-icon">
                <i class="fa fa-exchange"></i>
                <span class="badge">2</span>
              </a>
              <a href="#" class="action-icon">
                <i class="fa fa-heart-o"></i>
                <span class="badge">1</span>
              </a>
              <a href="{{ route('cart.index') }}" class="action-icon">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">15</span>
              </a>
              @guest
                <a href="{{ route('auth') }}" class="action-icon">
                  <i class="fa fa-user-o"></i>
                </a>
              @endguest
              @auth
                <a href="{{ route('account.orders') }}" class="action-icon">
                  <i class="fa fa-user-o"></i>
                </a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation Menu -->
    <div class="navigation-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-3">
            <div class="categories-dropdown">
              <button class="btn btn-categories">
                <i class="fa fa-bars"></i> All Categories
                <i class="fa fa-chevron-down"></i>
              </button>
            </div>
          </div>
          
          <div class="col-lg-6 col-md-6">
            <nav class="main-navigation">
              <ul class="nav-menu">
                <li><a href="{{ route('home') }}">Homepage <i class="fa fa-chevron-down"></i></a></li>
                <li><a href="{{ route('products.index') }}">Shop <i class="fa fa-chevron-down"></i></a></li>
                <li><a href="#">Pages <i class="fa fa-chevron-down"></i></a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
          </div>
          
          <div class="col-lg-3 col-md-3 text-right">
            <a href="#" class="btn btn-seller">
              Become a Seller <i class="fa fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer Area -->
    <footer class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="footer-widget">
              <h4 class="footer-title">Про нас</h4>
              <p>Ваш надійний партнер у покупках цифрових товарів та ігрових кодів.</p>
              <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="footer-widget">
              <h4 class="footer-title">Швидкі посилання</h4>
              <ul class="footer-links">
                <li><a href="{{ route('home') }}">Головна</a></li>
                <li><a href="{{ route('products.index') }}">Каталог</a></li>
                <li><a href="#">Про нас</a></li>
                <li><a href="#">Контакти</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="footer-widget">
              <h4 class="footer-title">Підтримка</h4>
              <ul class="footer-links">
                <li><a href="#">Допомога</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Повернення</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="footer-widget">
              <h4 class="footer-title">Контакти</h4>
              <div class="contact-info">
                <p><i class="fa fa-envelope"></i> info@new-store.com</p>
                <p><i class="fa fa-phone"></i> +380 44 123 45 67</p>
                <p><i class="fa fa-map-marker"></i> Київ, Україна</p>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row align-items-center">
            <div class="col-md-6">
              <p class="copyright">&copy; {{ date('Y') }} {{ config('app.name') }}. Всі права захищені.</p>
            </div>
            <div class="col-md-6 text-right">
              <div class="payment-methods">
                <img src="{{ asset('assets/images/card-1.svg') }}" alt="Visa" class="payment-icon">
                <img src="{{ asset('assets/images/card-2.svg') }}" alt="MasterCard" class="payment-icon">
                <img src="{{ asset('assets/images/card-3.svg') }}" alt="PayPal" class="payment-icon">
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

<style>
/* Header Styles */
.header-area {
    background: white;
    padding: 1.5rem 0;
    border-bottom: 1px solid #e9ecef;
    box-shadow: 0 2px 15px rgba(0,0,0,0.05);
    position: relative;
    z-index: 1000;
}

.logo a {
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease;
}

.logo a:hover {
    transform: scale(1.05);
}

.logo h2 {
    margin: 0;
    color: #604bfe;
    font-weight: 700;
    font-size: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.logo i {
    margin-right: 0;
    color: #ffd700;
    font-size: 2.2rem;
    text-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Search Bar Styles */
.search-bar {
    padding: 0 1rem;
}

.search-form .input-group {
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s ease;
}

.search-form .input-group:focus-within {
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
}

.category-select {
    border: none;
    background: #f8f9fa;
    border-right: 1px solid #dee2e6;
    max-width: 140px;
    padding: 0.75rem 1rem;
    font-weight: 500;
}

.search-form .form-control {
    border: none;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
}

.search-form .form-control:focus {
    box-shadow: none;
}

.btn-search {
    background: #ffd700;
    border: none;
    color: #333;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-search:hover {
    background: #ffed4e;
    color: #333;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
}

/* User Actions Styles */
.user-actions {
    display: flex;
    gap: 1.5rem;
    justify-content: flex-end;
    align-items: center;
}

.action-icon {
    position: relative;
    color: #666;
    font-size: 1.4rem;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.action-icon:hover {
    color: #604bfe;
    background: #f8f9fa;
    transform: translateY(-2px);
}

.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ff6b35;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    border: 2px solid white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

/* Navigation Styles */
.navigation-area {
    background: #ffd700;
    padding: 1rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.btn-categories {
    background: #333;
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    width: 100%;
    text-align: left;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.btn-categories:hover {
    background: #555;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.main-navigation .nav-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 2.5rem;
    justify-content: center;
    align-items: center;
}

.nav-menu li a {
    color: #333;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    position: relative;
}

.nav-menu li a:hover {
    color: #604bfe;
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-1px);
}

.nav-menu li a i {
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

.nav-menu li a:hover i {
    transform: rotate(180deg);
}

.btn-seller {
    background: #333;
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.btn-seller:hover {
    background: #555;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

/* Footer Styles */
.footer-area {
    background: #2c3e50;
    color: white;
    padding: 3rem 0 1rem;
    margin-top: 4rem;
}

.footer-widget {
    margin-bottom: 2rem;
}

.footer-title {
    color: #ecf0f1;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.5rem;
}

.footer-links a {
    color: #bdc3c7;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: #604bfe;
}

.social-links {
    margin-top: 1rem;
}

.social-links a {
    display: inline-block;
    width: 35px;
    height: 35px;
    background: #34495e;
    color: white;
    text-align: center;
    line-height: 35px;
    border-radius: 50%;
    margin-right: 0.5rem;
    transition: background 0.3s;
}

.social-links a:hover {
    background: #604bfe;
}

.contact-info p {
    margin-bottom: 0.5rem;
    color: #bdc3c7;
}

.contact-info i {
    margin-right: 0.5rem;
    color: #604bfe;
}

.footer-bottom {
    border-top: 1px solid #34495e;
    padding-top: 1rem;
    margin-top: 2rem;
}

.copyright {
    color: #bdc3c7;
    margin: 0;
}

.payment-methods {
    text-align: right;
}

.payment-icon {
    height: 30px;
    margin-left: 0.5rem;
    opacity: 0.7;
    transition: opacity 0.3s;
}

.payment-icon:hover {
    opacity: 1;
}

@media (max-width: 768px) {
    .search-bar {
        padding: 0;
        margin: 1rem 0;
    }
    
    .user-actions {
        justify-content: center;
        margin-top: 1rem;
    }
    
    .main-navigation .nav-menu {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .btn-seller {
        width: 100%;
        text-align: center;
        margin-top: 1rem;
    }
    
    .footer-bottom .text-right {
        text-align: left !important;
        margin-top: 1rem;
    }
    
    .payment-methods {
        text-align: left;
    }
}
</style>
  </body>
</html>
