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
                        <th class="py-3 text-muted">Người bán</th>
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
                                {{ $lh->nguoiMua->hoten ?? 'Người dùng không tồn tại' }}
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
                                <span class="material-symbols-outlined text-primary fs-5">storefront</span>
                                {{ $lh->batdongsan->user->hoten ?? 'N/A' }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined text-muted fs-6">calendar_month</span>
                                {{ \Carbon\Carbon::parse($lh->ngayDat)->format('d/m/Y') }}
                            </div>
                        </td>
                        <td>
                            @if($lh->trangThai == 'đã cọc')
                                <span class="badge bg-warning text-dark px-2 py-1 fs-6 rounded-pill">Đã cọc</span>
                            @elseif($lh->trangThai == 'hoàn thành')
                                <span class="badge bg-success px-2 py-1 fs-6 rounded-pill">Hoàn thành</span>
                            @elseif($lh->trangThai == 'hủy')
                                <span class="badge bg-danger px-2 py-1 fs-6 rounded-pill">Hủy</span>
                            @else
                                <span class="badge bg-secondary px-2 py-1 fs-6 rounded-pill">{{ $lh->trangThai }}</span>
                            @endif
                        </td>
                        <td class="px-4 text-end">
                            <form action="{{ route('admin.datlichhen.destroy', $lh->id_dat_lich_hen) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lịch hẹn này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-link text-danger p-0" title="Xóa">
                                    <span class="material-symbols-outlined fs-5">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Chưa có dữ liệu lịch hẹn.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection