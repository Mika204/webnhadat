@extends('layouts.adminapp')

@section('content')

<div class="d-flex align-items-center mb-4">
    <span class="material-symbols-outlined me-2 text-primary" style="font-size:2rem;">bar_chart</span>
    <h4 class="mb-0 fw-bold">Tổng quan hệ thống</h4>
    <span class="ms-3 text-muted small">Năm {{ date('Y') }}</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg,#1a73e8,#185abc)">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="material-symbols-outlined" style="font-size:2.8rem; opacity:.9">apartment</span>
                <div>
                    <div class="fs-2 fw-bold">{{ $tongBds }}</div>
                    <div class="small opacity-75">Bất động sản</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg,#34a853,#1e8e3e)">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="material-symbols-outlined" style="font-size:2.8rem; opacity:.9">group</span>
                <div>
                    <div class="fs-2 fw-bold">{{ $tongUser }}</div>
                    <div class="small opacity-75">Người dùng</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg,#fbbc05,#f09300)">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="material-symbols-outlined" style="font-size:2.8rem; opacity:.9">event_available</span>
                <div>
                    <div class="fs-2 fw-bold">{{ $tongLichhen }}</div>
                    <div class="small opacity-75">Lịch hẹn</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg,#ea4335,#c5221f)">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="material-symbols-outlined" style="font-size:2.8rem; opacity:.9">location_on</span>
                <div>
                    <div class="fs-2 fw-bold">{{ $tongKhuvuc }}</div>
                    <div class="small opacity-75">Khu vực</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection