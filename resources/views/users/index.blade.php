@extends('layouts.auth')

@section('title', 'Đăng nhập/Đăng ký')

@section('content')
<div>
    <a href="{{ route('home') }}" class="back-home d-flex align-items-center gap-2 text-decoration-none">
        <iconify-icon icon="solar:arrow-left-linear" class="back-icon"></iconify-icon>
        Trang chủ
    </a>
</div>
<div class="auth-wrapper {{ $type == 'register' ? 'is-registering' : '' }}" id="auth-wrapper">

    <div class="slide-container">

        <!-- LOGIN PANEL -->
        <div class="panel p-4">
            <div class="auth-icon">
                <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
            </div>
            <h4 class="text-center mb-1 fw-semibold">Chào mừng trở lại</h4>
            <p class="auth-subtitle">
                Đăng nhập để tiếp tục khám phá
            </p>            
            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    Đăng nhập
                </button>
            </form>

            <p class="text-center mt-3 small">
                Chưa có tài khoản?
                <button type="button" class="switch-link" onclick="toggleView()">
                    Đăng ký
                </button>
            </p>

        </div>

        <!-- REGISTER PANEL -->
        <div class="panel p-4">
            <div class="auth-icon">
                <iconify-icon icon="solar:user-plus-rounded-linear" ></iconify-icon>
            </div>
            <h4 class="text-center mb-1 fw-semibold">Tạo tài khoản</h4>
            <p class="auth-subtitle">
                Bắt đầu hành trình của bạn tại đây
            </p>
            

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Họ và tên</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    Đăng ký
                </button>
            </form>

            <p class="text-center mt-3 small">
                Đã có tài khoản?
                <button type="button" class="switch-link" onclick="toggleView()">
                    Đăng nhập
                </button>
            </p>

        </div>

    </div>
</div>

@endsection