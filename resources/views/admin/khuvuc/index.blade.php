@extends('layouts.adminapp')

@section('content')
<h2>Danh sách Khu vực</h2>

<a href="{{ route('admin.khuvuc.create') }}">+ Thêm mới</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên khu vực</th>
        <th>Hành động</th>
    </tr>
    @foreach($khuvucs as $kv)
    <tr>
        <td>{{ $kv->id }}</td>
        <td>{{ $kv->tenKv }}</td>
        <td>
            <a href="{{ route('admin.khuvuc.edit',$kv->idKv) }}">
                Sửa
            </a>
            <form action="{{ route('admin.khuvuc.destroy', $kv->idKv) }}" method="POST" style="display:inline;">
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
