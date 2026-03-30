@extends('layouts.app')

@section('title', 'Trang chủ | EstateX')

@section('content')

<!-- Categories + Filter Bar -->
<nav class="category-bar">
    <div class="category-tabs">
        <a href="{{ route('home') }}" class="category-link {{ request('idKv') ? '' : 'active' }}">
            Tất cả
        </a>
    </div>

    <div class="filter-group">
        <div class="dropdown">

            <button class="filter-btn" onclick="toggleKhuvuc()">
                <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                Khu vực
                <iconify-icon icon="solar:alt-arrow-down-linear"></iconify-icon>
            </button>
        
            <div id="khuvuc-menu" class="dropdown-menu">
                @foreach($khuvucs as $kv)
                    <a href="{{ route('home', ['idKv'=>$kv->idKv])}}">
                        {{ $kv->tenKv }}
                    </a>
                @endforeach
            </div>
        
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container text-center py-5">
        <h1 class="hero-title text-center">
            CHÀO MỪNG ĐẾN VỚI ESTATEX
            </br>TÌM KIẾM KHÔNG GIAN SỐNG HOÀN HẢO CỦA BẠN
        </h1>
        <p class="hero-subtitle">
            Khám phá các căn hộ, nhà phố và biệt thự tuyệt đẹp với trải nghiệm tìm kiếm thông minh và minh bạch nhất.
        </p>            
    </div>
</section>

<div class="row">

@if($batdongsan->count() > 0)

@foreach($batdongsan as $sp)

@php
$idSp = $sp->idbds;
$tenSp = $sp->tenBds;
$gia = number_format($sp->gia,0,',','.');
$khuvuc = $sp->khuvuc->tenKv ?? 'Không xác định';
@endphp

<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">

        <a href="{{ route('batdongsan.show', $sp->idbds) }}" class="product-link">

            @if($sp->hinhanhs->first())
                <img 
                src="{{ asset('storage/'.$sp->hinhanhs->first()->duong_dan_anh) }}" 
                class="card-img-top"
                style="height:200px; object-fit:cover;">
            @endif

            <div class="card-body bds-card-body">
                <div class="bds-price">
                    {{ $gia }} ₫
                </div>

                <h3 class="bds-title">
                    {{ $tenSp }}
                </h3>

                <div class="bds-footer">
                    <div class="bds-location">
                        <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                        {{ $khuvuc }}
                    </div>
                </div>
            </div>

        </a>

    </div>
</div>

@endforeach

@else

<p>Không có bất động sản nào.</p>

@endif

</div>

@if ($batdongsan instanceof \Illuminate\Pagination\LengthAwarePaginator && $batdongsan->lastPage() > 1)

<nav class="mt-4">
    <ul class="pagination justify-content-center">

        {{-- Previous --}}
        <li class="page-item {{ ($batdongsan->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $batdongsan->url($batdongsan->currentPage()-1) }}">
                Trước
            </a>
        </li>

        {{-- Page numbers --}}
        @for ($i = 1; $i <= $batdongsan->lastPage(); $i++)
            <li class="page-item {{ ($batdongsan->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $batdongsan->url($i) }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        {{-- Next --}}
        <li class="page-item {{ ($batdongsan->currentPage() == $batdongsan->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $batdongsan->url($batdongsan->currentPage()+1) }}">
                Sau
            </a>
        </li>

    </ul>
</nav>

@endif

<script>
function toggleKhuvuc() {
    document.getElementById("khuvuc-menu").classList.toggle("show");
}
</script>

@endsection
