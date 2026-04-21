@extends('layouts.adminapp')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
    <span class="material-symbols-outlined text-primary" style="font-size: 2rem;">apartment</span>
    <h4 class="mb-0 fw-bold">Danh sách Bất động sản</h4>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 text-muted">ID</th>
                        <th class="py-3 text-muted">Hình ảnh</th>
                        <th class="py-3 text-muted">Tên bất động sản</th>
                        <th class="py-3 text-muted">Giá</th>
                        <th class="px-4 py-3 text-muted text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($batdongsans as $bds)
                    <tr>
                        <td class="px-4 fw-semibold text-secondary">#{{ $bds->idbds }}</td>

                        {{-- Hình ảnh --}}
                        <td>
                            @if($bds->hinhanhs->first())
                                <img src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}" 
                                     width="80" height="60"
                                     style="object-fit: cover; border-radius: 6px;">
                            @else
                                <span class="text-muted small">Không có ảnh</span>
                            @endif
                        </td>

                        <td class="fw-medium text-dark">{{ $bds->tenBds }}</td>

                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 fs-6">
                                {{ number_format($bds->gia) }} VNĐ
                            </span>
                        </td>

                        <td class="px-4 text-end">
                            <form action="{{ route('admin.batdongsan.destroy', $bds->idbds) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bất động sản này?');">
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
                        <td colspan="5" class="text-center py-4 text-muted">Chưa có dữ liệu bất động sản.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
