@extends('layouts.adminapp')

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

    @foreach($batdongsans as $bds)
    <tr>
        <td>{{ $bds->idbds }}</td>
        <td>{{ $bds->tenBds }}</td>
        <td>{{ number_format($bds->gia) }} VND</td>
        <td>
            <a href="{{ route('admin.batdongsan.edit', $bds->idbds) }}">Sửa</a>

            <form action="{{ route('admin.batdongsan.destroy', $bds->idbds) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>

        </td>
    </tr>
    @endforeach

</table>
@endsection
