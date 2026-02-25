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
    <header class="site-header fixed-top bg-white border-bottom shadow-sm">
        <div class="container-xl">
            <div class="header-inner d-flex justify-content-between align-items-center">    
            <!-- Logo -->
            <a href="#" class="navbar-brand fw-semibold text-dark d-flex align-items-center gap-2">
                <div class="brand-icon">
                    <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
                </div>
                EstateX
            </a>
            

            <!-- Global Search Bar in Header -->
            <div class="d-none d-md-flex flex-grow-1 mx-5" style="max-width: 32rem;">
                <div class="position-relative w-100 group">
                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3 d-flex align-items-center" 
                        style="pointer-events: none;">
                        <iconify-icon icon="solar:magnifer-linear" 
                        class="text-slate-400 fs-lg transition-colors"></iconify-icon>
                    </div>
                    <input type="text" class="form-control rounded-pill search-input ps-5 pe-3 py-2 fs-sm fw-light w-100" 
                            placeholder="Tìm kiếm khu vực, tên đường,...">
                </div>
            </div>

            <!-- Actions -->
            <div class="d-none d-md-flex align-items-center gap-3">
                <a href="#" class="fs-sm fw-medium text-slate-600 hover-text-slate-900 text-decoration-none transition-colors">Đăng nhập</a>
                <a href="#" class="btn btn-slate-900 rounded-pill fs-sm fw-medium px-4 py-2 shadow-sm d-inline-flex align-items-center justify-content-center">
                    Đăng tin miễn phí
                </a>
            </div>

            <!-- Mobile menu buttons -->
            <div class="d-flex d-md-none align-items-center gap-2">
                <button type="button" class="btn btn-link text-slate-500 hover-text-slate-900 p-2 text-decoration-none border-0">
                    <iconify-icon icon="solar:magnifer-linear" class="fs-xl"></iconify-icon>
                </button>
                <button type="button" class="btn btn-link text-slate-500 hover-text-slate-900 p-2 text-decoration-none border-0">
                    <iconify-icon icon="solar:hamburger-menu-linear" class="fs-3xl"></iconify-icon>
                </button>
            </div>

        </div>
    </div>
</header>
<!-- Đẩy nội dung xuống vì header fixed-top -->
<div style="margin-top: 4rem;"></div>
    
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="contact-info">
            <a href="#" class="navbar-brand fw-semibold text-dark d-flex align-items-center gap-2">
                <div class="brand-icon">
                    <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
                </div>
                EstateX
            </a>
            <p class="footer-desc">
                Nền tảng giao dịch bất động sản minh bạch, cung cấp giải pháp tìm kiếm và đăng tin hiệu quả nhất.
            </p>
            <br>
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
