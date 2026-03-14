@extends('layouts.app')

@section('title', 'Trang chủ | EstateX')

@section('content')

<!-- Header -->
    <section class="hero-section">
        <div class="container text-center py-5">
            <h1 class="hero-title text-center">
                CHÀO MỪNG ĐẾN VỚI ESTATEX
            </br>TÌM KIẾM KHÔNG GIAN SỐNG HOÀN HẢO CỦA BẠN
            </h1>
            <p class="hero-subtitle">
                Khám phá các căn hộ, nhà phố và biệt thự tuyệt đẹp với trải nghiệm tìm kiếm thông minh và minh bạch nhất.
            </p>            
            <link rel="stylesheet" href="style.css">
        </div>
    </section>

    <div class="row">

        @if($list->count() > 0)
        
        @foreach($list as $sp)
        
        @php
        $idSp = $sp->idbds;
        $tenSp = $sp->tenBds;
        $gia = number_format($sp->gia,0,',','.');
        $moTa = $sp->moTa;
        @endphp
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <a href="{{ url('product/'.$idSp) }}" class="product-link">
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
                                {{ $moTa }}
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
        
        @if ($list->lastPage() > 1)

    <nav class="mt-4">
        <ul class="pagination justify-content-center">

            {{-- Nút Previous --}}
            <li class="page-item {{ ($list->currentPage() == 1) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $list->url($list->currentPage()-1) }}">
                    Trước
                </a>
            </li>

            {{-- Các số trang --}}
            @for ($i = 1; $i <= $list->lastPage(); $i++)

            <li class="page-item {{ ($list->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $list->url($i) }}">
                    {{ $i }}
                </a>
            </li>

            @endfor

            {{-- Nút Next --}}
            <li class="page-item {{ ($list->currentPage() == $list->lastPage()) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $list->url($list->currentPage()+1) }}">
                    Sau
                </a>
            </li>

        </ul>
    </nav>

@endif



<!-- Footer -->
    
    

@endsection