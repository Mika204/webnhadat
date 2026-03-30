@extends('layouts.adminapp')

@section('content')
<h1>Báo cáo doanh thu</h1>

<p><strong>Tổng doanh thu:</strong> {{ number_format($tongDoanhThu) }} VND</p>

<h2>Doanh thu theo tháng</h2>
<ul>
    @foreach($doanhThuTheoThang as $dt)
        <li>Tháng {{ $dt->thang }}: {{ number_format($dt->tong) }} VND</li>
    @endforeach
</ul>

@endsection