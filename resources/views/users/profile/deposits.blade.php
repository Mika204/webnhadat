<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Lịch sử đặt cọc</h5>
        <small class="text-muted">Theo dõi các giao dịch và trạng thái đặt cọc của bạn</small>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>ID nhà</th>
                    <th>Ngày hẹn</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>

            <tbody>

            @forelse($datlichhen as $lich)

                <tr>
                    <td>{{ $lich->idbds }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($lich->ngayhen)->format('d/m/Y') }}
                    </td>

                    <td>
                        @if($lich->trangthai == 1)
                            <span class="badge bg-success">Đặt cọc thành công</span>
                        @else
                            <span class="badge bg-warning text-dark">Đang xử lí</span>
                        @endif
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Bạn chưa có lịch đặt cọc nào
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
