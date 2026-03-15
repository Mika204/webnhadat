<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin - EstateX</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="bg-dark text-white p-3">
    <div class="container-fluid d-flex justify-content-between">

        <h4>Trang quản trị</h4>

        <div>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm">Đăng xuất</button>
            </form>
        </div>

    </div>
</header>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav class="col-md-2 bg-light min-vh-100 p-3">
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        Trang chủ
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.batdongsan.index') }}">Quản lý BĐS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">Quản lý Người dùng</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.datlichhen.index') }}">Quản lý Lịch hẹn</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.khuvuc.index') }}">Quản lý Khu vực</a>
                </li>
            </ul>
        </nav>

        <main class="col-md-10 p-4">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
