@extends('layouts.adminapp')

@section('content')

<h2>Danh sách Người dùng</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    @foreach($user as $user)
    <tr>
        <td>{{ $user->iduser }}</td>
        <td>{{ $user->hoten }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <form action="{{ route('admin.user.destroy', $user->iduser) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá người dùng này?')">
                    Xóa
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


<br><br>

<h2>Bài đăng bất động sản của User</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên BDS</th>
        <th>Giá</th>
        <th>Trạng thái</th>
    </tr>

    @foreach($bdsChoDuyet as $bds)
    <tr>
        <td>{{ $bds->id }}</td>
        <td>{{ $bds->tenBds }}</td>
        <td>{{ number_format($bds->gia) }} VND</td>

        <td>
            <a href="{{ route('admin.duyet.bai', $bds->idbds) }}">
                Duyệt
            </a>
            <a href="{{ route('admin.tu.choi.bai', $bds->idbds) }}">
                Từ chối
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
