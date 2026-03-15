@extends('layouts.app')

@section('content')
<h1>Giỏ hàng của bạn</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@if(session('info'))
    <p style="color:blue">{{ session('info') }}</p>
@endif

<ul>
    @foreach($giohang as $item)
        <li>
            {{ $item->batdongsan->tenBds }} - {{ number_format($item->batdongsan->gia) }} VND
            <form action="{{ route('giohang.remove', $item->idbds) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
