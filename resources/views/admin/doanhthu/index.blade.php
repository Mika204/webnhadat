@extends('layouts.adminapp')

@section('content')

<div class="d-flex align-items-center mb-4">
    <span class="material-symbols-outlined me-2 text-success" style="font-size:2rem;">payments</span>
    <h4 class="mb-0 fw-bold">Báo cáo doanh thu</h4>
    <span class="ms-3 text-muted small">Dữ liệu năm {{ date('Y') }}</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg,#34a853,#1e8e3e)">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="material-symbols-outlined" style="font-size:2.8rem; opacity:.9">account_balance_wallet</span>
                <div>
                    <div class="fs-4 fw-bold">{{ number_format($tongDoanhThu) }} VNĐ</div>
                    <div class="small opacity-75">Tổng doanh thu thực nhận</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Biểu đồ doanh thu --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center gap-2">
                <span class="material-symbols-outlined text-primary">trending_up</span>
                <h6 class="mb-0 fw-bold">Biểu đồ tăng trưởng tháng</h6>
            </div>
            <div class="card-body">
                <canvas id="doanhThuChart" height="250"></canvas>
            </div>
        </div>
    </div>

    {{-- Bảng chi tiết --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="max-height: 400px; overflow-y: auto;">
            <div class="card-header bg-white border-bottom">
                <h6 class="mb-0 fw-bold">Chi tiết theo tháng</h6>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Tháng</th>
                            <th class="text-end pe-3">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doanhThuTheoThang as $dt)
                            <tr>
                                <td class="ps-3 fw-medium">Tháng {{ $dt->thang }}</td>
                                <td class="text-end pe-3 text-success fw-bold">{{ number_format($dt->tong) }} đ</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">Chưa có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($nhanThang) !!},
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: {!! json_encode($doanhThuThang) !!},
                backgroundColor: 'rgba(52, 168, 83, 0.1)',
                borderColor: '#34a853',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#34a853',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1a1a2e',
                    padding: 12,
                    callbacks: {
                        label: function(context) {
                            return ' Doanh thu: ' + new Intl.NumberFormat('vi-VN').format(context.raw) + ' VNĐ';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0f0f0' },
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', { notation: 'compact' }).format(value);
                        }
                    }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
</script>
@endsection