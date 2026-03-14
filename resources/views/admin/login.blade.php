@extends('layouts.auth')

@section('title', 'Đăng nhập admin')

@section('content')

<div class="auth-wrapper " id="auth-wrapper">

    <div class="slide-container">

        <!-- LOGIN PANEL -->
        <div class="panel p-4">
            <div class="auth-icon">
                <iconify-icon icon="solar:home-smile-linear"></iconify-icon>
            </div>
            <h4 class="text-center mb-1 fw-semibold">Chào mừng trở lại</h4>
            <p class="auth-subtitle">
                Đăng nhập trở lại admin
            </p>            
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email</label>
                    <input type="email" name="emailadmin" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Mật khẩu</label>
                    <input type="password" name="passwordadmin" class="form-control">
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    Đăng nhập
                </button>
            </form>

        </div>