@extends('layouts.app')

@section('content')

<div class="container my-5 animate-up">
    <div class="d-flex align-items-center gap-3 mb-4">
        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
            <iconify-icon icon="solar:bookmark-linear" class="fs-2"></iconify-icon>
        </div>
        <div>
            <h1 class="fw-bold mb-0 h2">Giỏ hàng của bạn</h1>
            <p class="text-secondary mb-0">Bạn có {{ $giohang->count() }} bất động sản đang quan tâm</p>
        </div>
    </div>

    @if($giohang->isEmpty())
        <div class="card border-0 shadow-premium rounded-4 py-5">
            <div class="card-body text-center py-5">
                <div class="mb-4">
                    <iconify-icon icon="solar:cart-large-minimalistic-linear" class="display-1 text-muted opacity-25"></iconify-icon>
                </div>
                <h4 class="fw-bold text-dark">Giỏ hàng của bạn đang trống</h4>
                <p class="text-secondary mb-4">Dường như bạn chưa thêm bất động sản nào vào danh sách quan tâm.</p>
                <a href="{{ route('home') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">
                    <iconify-icon icon="solar:magnifer-linear" class="me-2 align-middle"></iconify-icon>
                    Khám phá nhà đất ngay
                </a>
            </div>
        </div>
    @else
        <div class="row g-4">
            <!-- Cột trái: Danh sách sản phẩm -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 cart-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 border-0">Bất động sản</th>
                                    <th class="py-3 border-0">Giá</th>
                                    <th class="px-4 py-3 border-0 text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($giohang as $item)
                                <tr>
                                    <td class="px-4 py-4">
                                        <div class="d-flex align-items-center gap-3">
                                            @if($item->batdongsan->hinhanhs->count() > 0)
                                                <img 
                                                    src="{{ asset('storage/' . $item->batdongsan->hinhanhs->first()->duong_dan_anh) }}" 
                                                    class="rounded-3 shadow-sm cart-item-img"
                                                    alt="{{ $item->batdongsan->tenBds }}"
                                                >
                                            @else
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center cart-item-img">
                                                    <iconify-icon icon="solar:image-linear" class="text-muted fs-2"></iconify-icon>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="fw-bold mb-1 text-dark">{{ $item->batdongsan->tenBds }}</h6>
                                                <div class="text-muted small d-flex align-items-center gap-1">
                                                    <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                                                    {{ $item->batdongsan->khuvuc->tenKv ?? 'Không xác định' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-nowrap">
                                        <div class="fw-bold text-primary fs-5">
                                            {{ number_format($item->batdongsan->gia, 0, ',', '.') }} ₫
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <form method="POST" action="{{ route('giohang.remove', $item->batdongsan->idbds) }}"
                                              onsubmit="return confirm('Xóa bất động sản này khỏi giỏ hàng?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle p-2" title="Xóa">
                                                <iconify-icon icon="solar:trash-bin-trash-linear" class="fs-5"></iconify-icon>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <a href="{{ route('home') }}" class="btn btn-link text-decoration-none text-muted p-0 d-flex align-items-center gap-1 fw-medium">
                        <iconify-icon icon="solar:alt-arrow-left-linear" class="fs-5"></iconify-icon>
                        Tiếp tục xem nhà đất
                    </a>
                    
                    <form method="POST" action="{{ route('giohang.clear') }}"
                          onsubmit="return confirm('Xóa tất cả bất động sản khỏi giỏ hàng?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-decoration-none text-danger p-0 d-flex align-items-center gap-1 fw-medium">
                            <iconify-icon icon="solar:eraser-linear" class="fs-5"></iconify-icon>
                            Dọn sạch giỏ hàng
                        </button>
                    </form>
                </div>
            </div>

            <!-- Cột phải: Tóm tắt đơn hàng -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-premium rounded-4 cart-summary">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Tóm tắt đặt cọc</h5>
                        
                        <div class="d-flex justify-content-between mb-2 text-secondary">
                            <span>Số lượng:</span>
                            <span class="fw-bold text-dark">{{ $giohang->count() }} BĐS</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4 text-secondary">
                            <span>Phí đặt cọc:</span>
                            <span class="fw-bold text-dark">5%</span>
                        </div>
                        
                        <hr class="opacity-5 my-4">
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="h5 fw-bold mb-0">Tổng tạm tính:</span>
                            <span class="h4 fw-bold text-primary mb-0">
                                @php
                                  $total_amount = 0;
                                  foreach($giohang as $item){
                                      $total_amount += $item->batdongsan->gia;
                                  }
                                @endphp
                                {{ number_format($total_amount * 0.05, 0, ',', '.') }} ₫
                            </span>
                        </div>

                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 small mb-4 border-start border-primary border-4">
                            <div class="d-flex gap-2">
                                <iconify-icon icon="solar:info-circle-bold" class="text-primary fs-5 mt-1"></iconify-icon>
                                <div>
                                    Bạn đang thực hiện đặt cọc online. Số tiền này sẽ được trừ vào hợp đồng chính thức sau này.
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 py-3 rounded-pill fw-bold h5 mb-0 shadow-sm d-flex align-items-center justify-content-center gap-2">
                            Tiến hành đặt lịch
                            <iconify-icon icon="solar:alt-arrow-right-linear" class="fs-4"></iconify-icon>
                        </a>
                      
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection