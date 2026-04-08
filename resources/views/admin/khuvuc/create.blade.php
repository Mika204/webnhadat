@extends('layouts.adminapp')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="d-flex align-items-center gap-2 mb-4">
            <span class="material-symbols-outlined text-primary" style="font-size: 2rem;">add_location</span>
            <h4 class="mb-0 fw-bold">Thêm Khu vực mới</h4>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                @if(session('error'))
                    <div class="alert alert-danger border-0 rounded-3 d-flex align-items-center gap-2 mb-4">
                        <span class="material-symbols-outlined">error</span>
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.khuvuc.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tên khu vực</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <span class="material-symbols-outlined text-secondary fs-5">push_pin</span>
                            </span>
                            <input type="text" 
                                   name="tenKv" 
                                   class="form-control border-start-0 bg-light" 
                                   value="{{ old('tenKv') }}" 
                                   required>
                        </div>
                        <div class="form-text mt-2">Đảm bảo tên khu vực là duy nhất để tránh nhầm lẫn.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined">add_circle</span>
                            Thêm mới ngay
                        </button>
                        <a href="{{ route('admin.khuvuc.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-medium">
                            Hủy bỏ
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('admin.khuvuc.index') }}" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-1">
                <span class="material-symbols-outlined fs-6">arrow_back</span>
                Quay về danh sách khu vực
            </a>
        </div>
    </div>
</div>
@endsection