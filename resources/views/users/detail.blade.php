@extends('layouts.app')

@section('content')

<main class="product-detail">

    <div class="product-image">

        @if($bds->hinhanhs->count())
            <img id="mainImage"
                src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}"
                style="width:100%; height:400px; object-fit:cover; border-radius:10px;">
        @else
            <img src="{{ asset('images/no-image.png') }}">
        @endif
    
        <div style="margin-top:10px; display:flex; gap:10px; flex-wrap:wrap;">
            @foreach($bds->hinhanhs as $img)
                <img 
                    src="{{ asset('storage/'.$img->duong_dan_anh) }}"
                    style="width:80px; height:80px; object-fit:cover; cursor:pointer; border-radius:6px;"
                    onclick="changeImage(this)">
            @endforeach
        </div>
    
    </div>    
    <div class="product-info">

        <h2>{{ $bds->tenBds }}</h2>

        <p>
            <strong>Giá:</strong> 
            {{ number_format($bds->gia) }} VNĐ
        </p>

        <p>
            <strong>Khu vực:</strong> 
            {{ $bds->khuvuc->tenKv ?? 'Không xác định' }}
        </p>

        <p>
            <strong>Mô tả:</strong><br>
            {!! nl2br(e($bds->moTa)) !!}
        </p>
        <form method="POST" action="{{ route('giohang.add',$bds->idbds) }}">
            @csrf
            <button type="submit" class="add-to-cart">
                Thêm vào giỏ hàng
            </button>
        </form>

        <a href="{{ route('home') }}" class="btn-backk">
            ← Quay lại
        </a>

    </div>

</main>
<script>
    function changeImage(element) {
        document.getElementById("mainImage").src = element.src;
    }
    </script>
    
@endsection
