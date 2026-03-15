@extends('layouts.app')

@section('content')
<h1>Danh sách bất động sản</h1>
<a href="{{ route('batdongsan.create') }}">Thêm bất động sản</a>
<ul>
    @foreach($batdongsans as $bds)
        <li>
            {{ $bds->tenBds }} - {{ number_format($bds->gia) }} VND
            <a href="{{ route('batdongsan.show', $bds->idbds) }}">Xem</a>
            <a href="{{ route('batdongsan.edit', $bds->idbds) }}">Sửa</a>
            <form action="{{ route('batdongsan.destroy', $bds->idbds) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
