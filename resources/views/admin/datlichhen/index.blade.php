@extends('layouts.admin')

@section('content')
<h2>Danh sách Lịch hẹn</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Bất động sản</th>
        <th>Ngày hẹn</th>
        <th>Hành động</th>
    </tr>
    @foreach($lichhen as $lh)
    <tr>
        <td>{{ $lh->id }}</td>
        <td>{{ $lh->user->name }}</td>
        <td>{{ $lh->batdongsan->tenBds }}</td>
        <td>{{ $lh->ngayhen }}</td>
        <td>
            <form action="{{ route('admin.datlichhen.destroy', $lh->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
