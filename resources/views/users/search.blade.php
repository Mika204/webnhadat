@extends('layouts.app')

@section('content')

<main class="content3">
    <h2>KẾT QUẢ TÌM KIẾM</h2>
    <p>
        Từ khóa: <strong>{{ $keyword }}</strong>
    </p>
    <br>
    <div class="product-list">
        @if(count($batdongsans) > 0)
            @foreach($batdongsans as $bds)
                <div class="ketqua">
                    @if($bds->hinhanhs->count() > 0)
                        <img 
                            src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}" 
                            class="card-img-top"
                            style="height:200px; object-fit:cover;"
                        >
                    @endif
                    <div class="product-info">
                        <h3>{{ $bds->tenBds }}</h3>
                        <p>
                            <b>Khu vực:</b> {{ $bds->tenKv }}
                        </p>
                        <p class="price">
                            {{ number_format($bds->gia) }} VNĐ
                        </p>
                        <p>
                            {{ $bds->moTa ?? 'Không có mô tả' }}
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            <p style="text-align:center;">
                Không tìm thấy bất động sản nào phù hợp.
            </p>
        @endif
    </div>
    <a href="{{ route('home') }}">← Quay lại trang chủ</a>
</main>
@endsection
