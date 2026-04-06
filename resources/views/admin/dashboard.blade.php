@extends('layouts.adminapp')

@section('content')

{{-- Tiêu đề --}}
<div class="d-flex align-items-center mb-4">
    <span class="material-symbols-outlined me-2 text-primary" style="font-size:2rem;">bar_chart</span>
    <h4 class="mb-0 fw-bold">Tổng quan hệ thống</h4>
    <span class="ms-3 text-muted small">Năm {{ date('Y') }}</span>
</div>

{{-- Thẻ thống kê --}}
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

{{-- Biểu đồ doanh thu --}}
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex align-items-center gap-2">
        <span class="material-symbols-outlined text-primary">trending_up</span>
        <div>
            <h6 class="mb-0 fw-bold">Doanh thu theo tháng ({{ date('Y') }})</h6>
            <small class="text-muted">Tổng tiền cọc từ lịch hẹn đã xác nhận</small>
        </div>
    </div>
    <div class="card-body">
        <canvas id="doanhThuChart" height="100"></canvas>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($nhanThang) !!},
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: {!! json_encode($doanhThuThang) !!},
                backgroundColor: 'rgba(13, 110, 253, 0.7)',
                borderColor: 'rgba(13, 110, 253, 1)',
                borderWidth: 1,
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return ' ' + new Intl.NumberFormat('vi-VN').format(context.raw) + ' VNĐ';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', { notation: 'compact' }).format(value);
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
