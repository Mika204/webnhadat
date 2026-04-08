<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Lịch sử đặt lịch hẹn</h5>
        <small class="text-muted">Theo dõi các giao dịch và trạng thái đặt cọc của bạn</small>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>Bất động sản</th>
                    <th>Ngày hẹn</th>
                    <th>Tiền cọc</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>

            <tbody>

                @forelse($datlichhen as $lich)

                <tr>
                    <td>{{ $lich->batdongsan->tenBds ?? 'Không xác định' }}</td>
                
                    <td>
                        {{ \Carbon\Carbon::parse($lich->ngayDat)->format('d/m/Y') }}
                    </td>
                
                    <td>
                        {{ number_format($lich->tienCoc,0,',','.') }} VND
                    </td>
                    <td>{{ $lich->batdongsan->diaChi ?? 'Không xác định' }}</td>
                    <td>
                        @if($lich->trangThai == 'hoàn thành')
                            <span class="badge bg-success">Hoàn thành</span>
                        @elseif($lich->trangThai == 'đã cọc')
                            <span class="badge bg-warning text-dark">Đã cọc</span>
                        @else
                            <span class="badge bg-danger">Đã hủy</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($lich->trangThai == 'đã cọc')
                            <form action="{{ route('datlichhen.destroy', $lich->id_dat_lich_hen) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Bạn chắc chắn muốn hủy lịch hẹn?')" 
                                        class="btn btn-outline-danger btn-sm rounded-pill">
                                    Hủy
                                </button>
                            </form>
                        @elseif($lich->trangThai == 'hoàn thành')
                            <span class="text-success small fw-bold">Giao dịch thành công</span>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Bạn chưa có lịch hẹn nào
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>