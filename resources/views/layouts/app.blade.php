<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>@yield('title', 'EstateX')</title>
    
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    
<body>
    <!-- HEADER -->
    <header class="site-header fixed-top">
        <div class="container-xl">
            <div class="header-inner">
    
                <!-- Logo -->
                <a href="#" class="brand">
                    <div class="brand-icon">
                        <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
                    </div>
                    <span class="brand-text">EstateX</span>
                </a>
    
                <!-- Search -->
                <div class="header-search">
                    <div class="search-wrapper">
                        <iconify-icon icon="solar:magnifer-linear" class="search-icon"></iconify-icon>
                        <input type="text" class="form-control search-input"
                            placeholder="Tìm kiếm khu vực, tên đường,...">
                    </div>
                </div>
    
                <!-- Desktop Actions -->
                <div class="header-actions">
                    @auth
                        <div class="welcome-message me-2">
                            Xin chào, {{ Auth::user()->hoten }}!
                        </div>
                        <a href="{{ url('saved') }}" class="header-icon">
                            <iconify-icon icon="solar:bookmark-linear"></iconify-icon>
                        </a>
                        <a href="{{ url('profile') }}" class="header-icon">
                            <iconify-icon icon="solar:user-linear"></iconify-icon>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="header-icon-btn">
                                <iconify-icon icon="solar:logout-2-linear"></iconify-icon>
                            </button>
                        </form>
                
                    @else
                        <a href="{{ route('login') }}" class="login-link">
                            Đăng nhập
                        </a>
                
                        <a href="#" class="btn btn-dark rounded-pill px-4">
                            Đăng tin miễn phí
                        </a>
                    @endauth
                
                </div>
                
                
                
    
                <!-- Mobile Buttons -->
                <div class="mobile-actions">
                    <button type="button" class="icon-btn">
                        <iconify-icon icon="solar:magnifer-linear"></iconify-icon>
                    </button>
                    <button type="button" class="icon-btn">
                        <iconify-icon icon="solar:hamburger-menu-linear"></iconify-icon>
                    </button>
                </div>
    
            </div>
        </div>
    </header>
<div style="margin-top: 4rem;"></div>
    
    <main class="main-content">

        <!-- Categories + Filter Bar -->
        <nav class="category-bar">
            <div class="category-tabs">
                <a href="#" class="category-link active">Tất cả</a>
            </div>
    
            <div class="filter-group">
                <div class="filter-dropdown">
                    <button class="filter-btn">
                        <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                        Khu vực
                        <iconify-icon icon="solar:alt-arrow-down-linear"></iconify-icon>
                    </button>
                </div>
            </div>
        </nav>
    
        @yield('content')
    
    </main>
    


    <footer class="footer">
        <div class="contact-info">
            <a href="#" class="footer-brand">
                <div class="footer-brand-icon">
                    <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
                </div>
                <span class="footer-brand-text">EstateX</span>
            </a>            
            <p class="footer-desc">
                Nền tảng giao dịch bất động sản minh bạch, cung cấp giải pháp tìm kiếm và đăng tin hiệu quả nhất.
            </p>
        </div>
        <div class="footer-bottom">
            <p class="footer-copy">
                &copy; 2026 EstateX. All rights reserved.
            </p>
        </div>
    </footer>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    @stack('scripts')

</body>
</html>