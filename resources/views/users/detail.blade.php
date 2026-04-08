@extends('layouts.app')

@section('content')

<div class="container animate-up">
    <div class="row g-5">
        
        <!-- Cột trái: Gallery Ảnh -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-premium overflow-hidden rounded-4">
                <div class="position-relative">
                    @if($bds->hinhanhs->count())
                        <img id="mainImage"
                            src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}"
                            class="img-fluid w-100 detail-main-img"
                            alt="{{ $bds->tenBds }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center detail-main-img">
                            <iconify-icon icon="solar:gallery-linear" class="display-1 text-muted"></iconify-icon>
                        </div>
                    @endif
                    
                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-10 backdrop-blur">
                         <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill">
                            <iconify-icon icon="solar:camera-linear" class="me-1 align-middle"></iconify-icon>
                            {{ $bds->hinhanhs->count() }} Ảnh
                        </span>
                    </div>
                </div>
            </div>
            
            @if($bds->hinhanhs->count() > 1)
            <div class="mt-3 d-flex gap-2 overflow-auto no-scrollbar pb-2">
                @foreach($bds->hinhanhs as $img)
                    <div class="thumbnail-item flex-shrink-0">
                        <img 
                            src="{{ asset('storage/'.$img->duong_dan_anh) }}"
                            class="img-fluid rounded-3 border"
                            onclick="changeImage(this)">
                    </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Cột phải: Thông tin & Hành động -->
        <div class="col-lg-5">
            <div class="sticky-top" style="top: 100px;">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </nav>

                <h1 class="fw-bold mb-3 display-6">{{ $bds->tenBds }}</h1>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bds-price fs-2 mb-0">
                        {{ number_format($bds->gia, 0, ',', '.') }} ₫
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                        Đang mở
                    </span>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-3">
                                    <iconify-icon icon="solar:map-point-linear" class="fs-4"></iconify-icon>
                                </div>
                                <div>
                                    <div class="text-muted small">Khu vực / Địa chỉ</div>
                                    <div class="fw-medium">{{ $bds->khuvuc->tenKv ?? 'Không xác định' }}</div>
                                    <div class="text-secondary small">{{ $bds->diaChi ?? 'Liên hệ chủ nhà' }}</div>
                                </div>
                            </div>
                            
                            <hr class="my-1 opacity-5">
                            
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-info bg-opacity-10 text-info p-2 rounded-3">
                                    <iconify-icon icon="solar:notes-linear" class="fs-4"></iconify-icon>
                                </div>
                                <div class="w-100">
                                    <div class="text-muted small">Mô tả</div>
                                    <div class="text-secondary detail-desc">
                                        {!! nl2br(e($bds->moTa)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hành động -->
                <div class="d-grid gap-3">
                    <form method="POST" action="{{ route('giohang.add',$bds->idbds) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold d-flex align-items-center justify-content-center gap-2 shadow-sm">
                            <iconify-icon icon="solar:cart-large-2-linear" class="fs-4"></iconify-icon>
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                    
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg rounded-pill py-3 fw-medium d-flex align-items-center justify-content-center gap-2">
                        <iconify-icon icon="solar:alt-arrow-left-linear" class="fs-4"></iconify-icon>
                        Quay lại trang chủ
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
function changeImage(element) {
    document.getElementById("mainImage").src = element.src;
}
</script>
    
@endsection