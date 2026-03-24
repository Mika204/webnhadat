@extends('layouts.app')

@section('content')
<h1>Đặt lịch hẹn cho {{ $bds->tenBds }}</h1>

<form action="{{ route('datlichhen.store', $bds->idbds) }}" method="POST">
    @csrf
    <label>Ngày hẹn:</label>
    <input type="date" name="ngayDat" required><br>

    <label>Tiền cọc:</label>
    <input type="number" name="tienCoc"><br>

    <label>Phương thức thanh toán:</label>
    <select name="pttt" required>
        <option value="tiền mặt">Tiền mặt</option>
        <option value="chuyển khoản">Chuyển khoản</option>
    </select><br>

    <button type="submit">Đặt lịch</button>
</form>
@endsection
