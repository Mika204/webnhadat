@extends('layouts.app')

@section('content')

<!-- Header Kết quả tìm kiếm -->
<div class="search-header py-5">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-2">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary rounded-pill d-inline-flex align-items-center px-3">
                <iconify-icon icon="solar:alt-arrow-left-linear" class="me-1"></iconify-icon>
                Quay lại
            </a>
            <span class="text-muted">|</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                </ol>
            </nav>
        </div>
        
        <h2 class="fw-bold display-6 mb-2">Kết quả cho: <span class="text-primary">"{{ $keyword }}"</span></h2>
        <p class="text-secondary mb-0">Tìm thấy <strong>{{ count($batdongsans) }}</strong> bất động sản phù hợp với yêu cầu của bạn.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        @if(count($batdongsans) > 0)
            @foreach($batdongsans as $bds)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{ route('batdongsan.show', $bds->idbds) }}" class="product-link">
                            <div class="position-relative overflow-hidden">
                                @if($bds->hinhanhs->count() > 0)
                                    <img 
                                        src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}" 
                                        class="card-img-top"
                                        alt="{{ $bds->tenBds }}"
                                        style="height:240px; object-fit:cover;"
                                    >
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:240px;">
                                        <iconify-icon icon="solar:gallery-linear" class="display-1 text-muted"></iconify-icon>
                                    </div>
                                @endif
                                
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill">
                                        <iconify-icon icon="solar:tag-linear" class="me-1 align-middle"></iconify-icon>
                                        {{ $bds->tenKv }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="card-body bds-card-body">
                                <div class="bds-price">
                                    {{ number_format($bds->gia, 0, ',', '.') }} ₫
                                </div>
                                
                                <h3 class="bds-title">
                                    {{ $bds->tenBds }}
                                </h3>
                                
                                <div class="bds-footer mt-3">
                                    <div class="bds-location">
                                        <iconify-icon icon="solar:map-point-linear" class="text-primary"></iconify-icon>
                                        {{ $bds->tenKv }}
                                    </div>
                                    <div class="text-primary fw-medium small">
                                        Xem chi tiết
                                        <iconify-icon icon="solar:alt-arrow-right-linear" class="ms-1 align-middle"></iconify-icon>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 py-5 text-center">
                <div class="mb-4">
                    <iconify-icon icon="solar:ufo-linear" class="display-1 text-muted opacity-25"></iconify-icon>
                </div>
                <h4 class="text-dark">Rất tiếc, không tìm thấy kết quả nào</h4>
                <p class="text-secondary">Hãy thử lại với từ khóa khác hoặc quay lại trang chủ.</p>
                <a href="{{ route('home') }}" class="btn btn-primary px-4 py-2 mt-3 rounded-pill">
                    Tiếp tục khám phá
                </a>
            </div>
        @endif
    </div>
</div>
@endsection