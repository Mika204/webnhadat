@extends('layouts.adminapp')

@section('content')

<h1>Chào mừng trở lại người quản trị</h1>

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Đăng xuất</button>
    </form>
    

@endsection
