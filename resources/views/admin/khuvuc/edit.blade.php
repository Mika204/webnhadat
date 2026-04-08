@extends('layouts.adminapp')

@section('content')

<div class="row justify-content-center animate-up">
    <div class="col-md-6">
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle">
                <span class="material-symbols-outlined fs-2">edit_location</span>
            </div>
            <div>
                <h4 class="mb-0 fw-bold">Chỉnh sửa Khu vực</h4>
                <p class="text-secondary mb-0">Cập nhật thông tin vị trí địa lý</p>
            </div>
        </div>

        <div class="card border-0 shadow-premium rounded-4">
            <div class="card-body p-4 p-lg-5">
                @if(session('success'))
                    <div class="alert alert-success border-0 rounded-3 d-flex align-items-center gap-2 mb-4 animate-up">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger border-0 rounded-3 d-flex align-items-center gap-2 mb-4 animate-up">
                        <span class="material-symbols-outlined">error</span>
                        {{ session('error') }}
                    </div>
                @endif

                @if($khuvuc)
                    <form method="POST" action="{{ route('admin.khuvuc.update', $khuvuc->idKv) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="idKv" value="{{ $khuvuc->idKv }}">

                        <div class="mb-5">
                            <label class="form-label fw-bold small text-muted text-uppercase mb-3">Tên khu vực</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0 px-3">
                                    <span class="material-symbols-outlined text-primary">push_pin</span>
                                </span>
                                <input type="text"
                                       name="tenKv"
                                       class="form-control border-start-0 ps-0 fw-medium"
                                       value="{{ $khuvuc->tenKv }}"
                                       placeholder="Ví dụ: Quận 1, Tp. Hồ Chí Minh"
                                       required>
                            </div>
                            <div class="form-text mt-2">Đảm bảo tên khu vực rõ ràng và dễ tìm kiếm.</div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined">save</span>
                                Lưu thay đổi
                            </button>
                            <a href="{{ route('admin.khuvuc.index') }}" class="btn btn-light px-4 py-3 rounded-pill fw-medium text-secondary">
                                Hủy bỏ
                            </a>
                        </div>
                    </form>
                @else
                    <div class="text-center py-5">
                        <div class="bg-light d-inline-flex p-4 rounded-circle mb-4">
                            <span class="material-symbols-outlined text-muted" style="font-size: 3rem;">location_off</span>
                        </div>
                        <h5 class="fw-bold">Lỗi hệ thống</h5>
                        <p class="text-secondary">Không tìm thấy khu vực để sửa hoặc ID không hợp lệ.</p>
                        <a href="{{ route('admin.khuvuc.index') }}" class="btn btn-primary rounded-pill px-5 py-2 mt-3 fw-bold">Quay lại danh sách</a>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="mt-4 text-center">
            <a href="{{ route('admin.khuvuc.index') }}" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-2 fw-medium hover-translate">
                <span class="material-symbols-outlined fs-6">arrow_back</span>
                Quay về danh sách quản lý khu vực
            </a>
        </div>
    </div>
</div>

@endsection