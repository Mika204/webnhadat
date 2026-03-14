@extends('layouts.admin')

@section('content')
<h2>Danh sách Bất động sản</h2>

<a href="{{ route('admin.batdongsan.create') }}">+ Thêm mới</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>
    @foreach($batdongsan as $bds)
    <tr>
        <td>{{ $bds->id }}</td>
        <td>{{ $bds->tenBds }}</td>
        <td>{{ number_format($bds->gia) }} VND</td>
        <td>
            <a href="{{ route('admin.batdongsan.edit', $bds->id) }}">Sửa</a>
            <form action="{{ route('admin.batdongsan.destroy', $bds->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
