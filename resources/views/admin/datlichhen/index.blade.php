@extends('layouts.adminapp')

@section('content')
<h2>Danh sách Lịch hẹn</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Người mua</th>
        <th>Người bán</th>
        <th>Bất động sản</th>
        <th>Ngày hẹn</th>
        <th>Tiền cọc</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>

    @forelse($lichhens as $lh)
    <tr>
        <td>{{ $lh->id_dat_lich_hen }}</td>

        <td>{{ $lh->nguoiMua->hoten ?? '-' }}</td> 

        <td>{{ $lh->batdongsan->user->hoten ?? '-' }}</td> 

        <td>{{ $lh->batdongsan->tenBds ?? '-' }}</td>

        <td>{{ \Carbon\Carbon::parse($lh->ngayDat)->format('d/m/Y') }}</td>

        <td>{{ number_format($lh->tienCoc, 0, ',', '.') }} VND</td>

        <td>
            @if($lh->trangThai == 'đã xác nhận')
                <span style="color: green;">Đã xác nhận</span>
            @elseif($lh->trangThai == 'chờ xác nhận')
                <span style="color: orange;">Chờ xác nhận</span>
            @elseif($lh->trangThai == 'đã cọc')
                <span style="color: blue;">Đã cọc</span>
            @else
                <span style="color: red;">Đã huỷ</span>
            @endif
        </td>

        <td>

            <form action="{{ route('admin.datlichhen.update', $lh->id_dat_lich_hen) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')

                <select name="trangThai" onchange="this.form.submit()">
                    <option value="chờ xác nhận" {{ $lh->trangThai == 'chờ xác nhận' ? 'selected' : '' }}>
                        Chờ xác nhận
                    </option>
                    <option value="đã xác nhận" {{ $lh->trangThai == 'đã xác nhận' ? 'selected' : '' }}>
                        Đã xác nhận
                    </option>
                    <option value="huỷ" {{ $lh->trangThai == 'huỷ' ? 'selected' : '' }}>
                        Huỷ
                    </option>
                </select>
            </form>

            <form action="{{ route('admin.datlichhen.destroy', $lh->id_dat_lich_hen) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')">
                    Xóa
                </button>
            </form>

        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8" style="text-align:center; color:gray;">
            Không có lịch hẹn nào
        </td>
    </tr>
    @endforelse
</table>

@endsection
