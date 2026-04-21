@extends('layouts.app')

@section('content')

<div class="container my-5 animate-up">
    <div class="d-flex align-items-center gap-3 mb-5">
        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
            <iconify-icon icon="solar:card-2-linear" class="fs-2"></iconify-icon>
        </div>
        <div>
            <h1 class="fw-bold mb-0 h2">Thanh toán tiền cọc</h1>
            <p class="text-secondary mb-0">Hoàn tất đặt cọc để giữ chỗ bất động sản</p>
        </div>
    </div>

    @if($giohang->isEmpty())
        <div class="card border-0 shadow-premium rounded-4 py-5">
            <div class="card-body text-center py-5">
                <iconify-icon icon="solar:ghost-linear" class="display-1 text-muted opacity-25 mb-4"></iconify-icon>
                <h4 class="fw-bold">Giỏ hàng trống!</h4>
                <p class="text-secondary">Bạn không có sản phẩm nào để thanh toán.</p>
                <a href="{{ route('home') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold mt-3">Quay lại trang chủ</a>
            </div>
        </div>
    @else
        <form method="POST" action="{{ route('checkout.pay') }}">
            @csrf
            <div class="row g-4">
                
                <!-- Cột trái: Thông tin & Form -->
                <div class="col-lg-7">
                    <!-- Thông tin khách hàng -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center gap-2">
                                <iconify-icon icon="solar:user-id-linear" class="text-primary fs-4"></iconify-icon>
                                Thông tin khách hàng
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="checkout-label">Họ và tên</div>
                                    <div class="fw-bold fs-5 text-dark">{{ Auth::user()->hoten }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-label">Email liên hệ</div>
                                    <div class="fw-bold fs-5 text-dark">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="col-12">
                                    <div class="checkout-label">Số điện thoại</div>
                                    <div class="fw-bold fs-5 text-dark">{{ Auth::user()->sdt ?? 'Chưa cập nhật' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center gap-2">
                                <iconify-icon icon="solar:calendar-date-linear" class="text-primary fs-4"></iconify-icon>
                                Thông tin và Phương thức
                            </h5>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-3">Ngày hẹn gặp xem nhà</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 px-3">
                                            <iconify-icon icon="solar:calendar-minimalistic-linear" class="text-primary"></iconify-icon>
                                        </span>
                                        <input type="date" name="ngayhen" class="form-control border-start-0 ps-0 py-3" 
                                               min="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-text mt-2 small text-secondary">Chọn ngày bạn muốn đến tham quan trực tiếp.</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-3">Phương thức thanh toán</label>
                                    
                                    <div class="payment-method-card active rounded-3 p-3 d-flex align-items-center gap-3">
                                        <div class="bg-primary text-white rounded-circle p-2 d-flex align-items-center justify-content-center">
                                            <iconify-icon icon="solar:bank-linear" class="fs-5"></iconify-icon>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">Chuyển khoản ngân hàng</div>
                                            <div class="small text-secondary">An toàn & Nhanh chóng</div>
                                        </div>
                                        <input type="hidden" name="pttt" value="chuyển khoản">
                                        <iconify-icon icon="solar:check-circle-bold" class="ms-auto text-primary fs-4"></iconify-icon>
                                    </div>
                                    <div class="form-text mt-2 small text-secondary">Chỉ hỗ trợ chuyển khoản để đảm bảo an toàn.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-premium rounded-4 sticky-top" style="top: 100px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Tóm tắt đặt cọc (5%)</h5>
                            
                            <div class="list-group list-group-flush mb-4 overflow-auto no-scrollbar" style="max-height: 300px;">
                                @foreach($giohang as $item)
                                    <div class="list-group-item px-0 py-3 bg-transparent border-bottom">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div class="fw-bold text-dark w-70" style="font-size: 0.95rem;">{{ $item->batdongsan->tenBds }}</div>
                                            <div class="text-primary fw-bold text-nowrap">
                                                {{ number_format($item->batdongsan->gia * 0.05, 0, ',', '.') }} ₫
                                            </div>
                                        </div>
                                        <div class="text-muted small d-flex align-items-center gap-1">
                                            <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                                            {{ $item->batdongsan->diaChi }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 p-4 bg-primary bg-opacity-10 rounded-4">
                                <span class="h6 mb-0 fw-bold text-dark">Tổng cộng:</span>
                                <span class="h3 mb-0 fw-bold text-primary">
                                    {{ number_format($totalCoc, 0, ',', '.') }} ₫
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold mb-4 shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <iconify-icon icon="solar:check-read-linear" class="fs-4"></iconify-icon>
                                Xác nhận & Đặt lịch ngay
                            </button>
                            
                            <div class="text-center mb-4">
                                <a href="{{ route('giohang.index') }}" class="btn btn-link text-decoration-none text-muted small fw-medium p-0">
                                    <iconify-icon icon="solar:alt-arrow-left-linear" class="align-middle me-1"></iconify-icon>
                                    Quay lại chỉnh sửa giỏ hàng
                                </a>
                            </div>

                            <div class="bg-warning bg-opacity-10 p-3 rounded-3 border-start border-warning border-4">
                                <h6 class="fw-bold text-dark mb-1 small d-flex align-items-center gap-2">
                                    <iconify-icon icon="solar:info-circle-bold" class="text-warning fs-5"></iconify-icon>
                                    Lưu ý đặt cọc
                                </h6>
                                <p class="small text-secondary mb-0" style="line-height: 1.5; font-size: 0.85rem;">
                                    Tiền cọc này nhằm đảm bảo quyền ưu tiên xem và mua tài sản của bạn. Chúng tôi sẽ liên hệ trong 24h để hoàn tất thủ tục.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    @endif
</div>

@endsection