<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - EstateX</title>

    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

<header class="bg-dark text-white p-3">
    <div class="container-fluid d-flex justify-content-between">

        <h4>Trang quản trị</h4>

        </div>

    </div>
</header>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav class="col-md-2 bg-white min-vh-100 p-3 border-end shadow-sm d-flex flex-column">
            <div class="mb-4 px-2">
                <span class="fw-bold text-primary" style="font-size:1.1rem;"> EstateX Admin</span>
            </div>
            <ul class="nav flex-column gap-1">
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                        <span class="material-symbols-outlined" style="color:#1a73e8">dashboard</span>
                        Tổng quan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.batdongsan.index') }}">
                        <span class="material-symbols-outlined" style="color:#34a853">apartment</span>
                        Bất động sản
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.user.index') }}">
                        <span class="material-symbols-outlined" style="color:#fbbc05">group</span>
                        Người dùng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.datlichhen.index') }}">
                        <span class="material-symbols-outlined" style="color:#ea4335">event_available</span>
                        Lịch hẹn
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.khuvuc.index') }}">
                        <span class="material-symbols-outlined" style="color:#8e24aa">location_on</span>
                        Khu vực
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{ route('admin.doanhthu.index') }}">
                        <span class="material-symbols-outlined" style="color:#202124">payments</span>
                        Doanh thu
                    </a>
                </li>
            </ul>
            <div class="mt-auto pt-3 border-top">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="sidebar-link w-100 text-start border-0 bg-transparent text-danger fw-bold" type="submit" style="padding: 10px 12px;">
                        <span class="material-symbols-outlined">logout</span>
                        Đăng xuất
                    </button>
                </form>
            </div>
        </nav>

        <main class="col-md-10 p-4">
            @yield('content')
        </main>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')

</body>
</html>