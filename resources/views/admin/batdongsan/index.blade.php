@extends('layouts.adminapp')

@section('content')
<h2>Danh sách Bất động sản</h2>


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
            <form action="{{ route('admin.batdongsan.destroy', $bds->idbds) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')">
                    Xóa
                </button>
            </form>

        </td>
    </tr>
    @endforeach

</table>
@endsection
