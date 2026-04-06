@extends('layouts.adminapp')

@section('content')
<div class="d-flex align-items-center mb-4 gap-2">
    <span class="material-symbols-outlined text-success" style="font-size: 2rem;">group</span>
    <h4 class="mb-0 fw-bold">Danh sách Người dùng</h4>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 text-muted">ID</th>
                        <th class="py-3 text-muted">Tên người dùng</th>
                        <th class="py-3 text-muted">Email</th>
                        <th class="px-4 py-3 text-muted text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $user)
                    <tr>
                        <td class="px-4 fw-semibold text-secondary">#{{ $user->iduser }}</td>
                        <td class="fw-medium text-dark">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">person</span>
                                </div>
                                {{ $user->hoten }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <span class="material-symbols-outlined fs-6">mail</span>
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="px-4 text-end">
                            <form action="{{ route('admin.user.destroy', $user->iduser) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
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
                        <td colspan="4" class="text-center py-5 text-muted">
                            <div class="d-flex flex-column align-items-center justify-content-center opacity-50">
                                <span class="material-symbols-outlined mb-2" style="font-size: 3rem;">group_off</span>
                                <div>Chưa có dữ liệu người dùng.</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


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
