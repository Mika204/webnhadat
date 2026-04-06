@extends('layouts.adminapp')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-2">
        <span class="material-symbols-outlined text-danger" style="font-size: 2rem;">location_on</span>
        <h4 class="mb-0 fw-bold">Danh sách Khu vực</h4>
    </div>
    <a href="{{ route('admin.khuvuc.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-1 shadow-sm">
        <span class="material-symbols-outlined fs-6">add</span> Thêm mới
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 text-muted">ID</th>
                        <th class="py-3 text-muted">Tên khu vực</th>
                        <th class="px-4 py-3 text-muted text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($khuvucs as $kv)
                    <tr>
                        <td class="px-4 fw-semibold text-secondary">#{{ $kv->idKv }}</td>
                        <td class="fw-medium text-dark">
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined text-danger fs-5">push_pin</span>
                                {{ $kv->tenKv }}
                            </div>
                        </td>
                        <td class="px-4 text-end">
                            <form action="{{ route('admin.khuvuc.destroy', $kv->idKv) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khu vực này?');">
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
                        <td colspan="3" class="text-center py-5 text-muted">
                            <div class="d-flex flex-column align-items-center justify-content-center opacity-50">
                                <span class="material-symbols-outlined mb-2" style="font-size: 3rem;">wrong_location</span>
                                <div>Chưa có dữ liệu khu vực.</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

