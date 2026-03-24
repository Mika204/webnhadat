@extends('layouts.app')

@section('title', 'Thanh toán tiền cọc')

@section('content')
<h1>Thanh toán tiền cọc</h1>

@if($giohang->isEmpty())
    <p>Giỏ hàng trống!</p>
@else
<form method="POST" action="{{ route('checkout.pay') }}">
    @csrf

    <h2>Thông tin khách hàng</h2>
    <p>Họ tên: <strong>{{ Auth::user()->hoten }}</strong></p>
    <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
    <p>SĐT: <strong>{{ Auth::user()->sdt ?? '-' }}</strong></p>

    <h2>Thông tin bất động sản</h2>
    <ul>
        @foreach($giohang as $item)
            <li>
                <strong>{{ $item->batdongsan->tenBDS }}</strong> <br>
                Hẹn gặp quý khách ở: {{ $item->batdongsan->moTa }} <br>
                Tiền cọc: {{ number_format($item->batdongsan->gia * 0.05, 0, ',', '.') }} VND
            </li>
            <hr>
        @endforeach
    </ul>

    <p>
        <strong>Tổng tiền cọc: 
            {{ number_format($totalCoc, 0, ',', '.') }} VND
        </strong>
    </p>

    <label>Ngày hẹn</label><br>
    <input type="date" name="ngayhen" min="{{ date('Y-m-d') }}" required><br><br>

    <label>Phương thức thanh toán</label><br>
    <select name="pttt" required>
        <option value="tiền mặt">Tiền mặt</option>
        <option value="chuyển khoản">Chuyển khoản</option>
    </select><br><br>

    <button type="submit">Thanh toán tiền cọc & Tạo lịch hẹn</button>
</form>
@endif

@endsection
