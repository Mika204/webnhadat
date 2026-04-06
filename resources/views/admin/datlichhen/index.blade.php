@extends('layouts.adminapp')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
    <span class="material-symbols-outlined text-warning" style="font-size: 2rem;">event_available</span>
    <h4 class="mb-0 fw-bold">Danh sách Lịch hẹn</h4>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 text-muted">ID</th>
                        <th class="py-3 text-muted">Khách hàng</th>
                        <th class="py-3 text-muted">Bất động sản</th>
                        <th class="py-3 text-muted">Ngày hẹn</th>
                        <th class="py-3 text-muted">Trạng thái</th>
                        <th class="px-4 py-3 text-muted text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lichhens as $lh)
                    <tr>
                        <td class="px-4 fw-semibold text-secondary">#{{ $lh->id_dat_lich_hen }}</td>
                        <td class="fw-medium text-dark">
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined text-muted fs-5">person</span>
                                {{ $lh->user->hoten ?? 'Người dùng không tồn tại' }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined text-muted fs-5">real_estate_agent</span>
                                {{ $lh->batdongsan->tenBds ?? 'Đã bị xóa' }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined text-muted fs-6">calendar_month</span>
                                {{ \Carbon\Carbon::parse($lh->ngayDat)->format('d/m/Y') }}
                            </div>
                        </td>
                        <td>
                            @if(strtolower($lh->trangThai) == 'chờ xác nhận' || empty($lh->trangThai))
                                <span class="badge bg-warning text-dark px-2 py-1 fs-6 rounded-pill">Chờ xác nhận</span>
                            @elseif(strtolower($lh->trangThai) == 'đã xác nhận' || strtolower($lh->trangThai) == 'xác nhận')
                                <span class="badge bg-success px-2 py-1 fs-6 rounded-pill">Đã xác nhận</span>
                            @else
                                <span class="badge bg-secondary px-2 py-1 fs-6 rounded-pill">{{ $lh->trangThai }}</span>
                            @endif
                        </td>
                        <td class="px-4 text-end">
                            <form action="{{ route('admin.datlichhen.destroy', $lh->id_dat_lich_hen) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lịch hẹn này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center justify-content-center" title="Xóa">
                                    <span class="material-symbols-outlined fs-6 me-1">delete</span> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Chưa có dữ liệu lịch hẹn.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
