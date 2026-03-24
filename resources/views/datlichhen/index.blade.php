@extends('layouts.app')

@section('content')
<h1>Lịch hẹn của bạn</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<ul>
    @foreach($lichhens as $lh)
        <li>
            {{ $lh->batdongsan->tenBds }} - Ngày: {{ $lh->ngayDat }} - 
            Trạng thái: {{ $lh->trangThai }}
        </li>
    @endforeach
</ul>
@endsection
