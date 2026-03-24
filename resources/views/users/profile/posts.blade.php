
<h2> Tin đăng của tôi</h2>

<a href="{{ route('batdongsan.create') }}" class="btn btn-primary">
    + Đăng tin mới
</a>


@if($posts->count() > 0)

    <div class="row">

        @foreach($posts as $bds)

            <div class="col-md-4 mb-4">
                <div class="card">

                    @if($bds->hinhanhs->first())
                        <img 
                            src="{{ asset('storage/'.$bds->hinhanhs->first()->duong_dan_anh) }}" 
                            style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body">

                        <h5>{{ $bds->tenBds }}</h5>

                        <p><b>Giá:</b> {{ number_format($bds->gia) }} VNĐ</p>

                        <p><b>Khu vực:</b> {{ $bds->khuvuc->tenKv ?? '' }}</p>

                        <p>
                            Trạng thái: 
                            <b>
                                @if($bds->trangThai == 'chờ duyệt')
                                    Chờ duyệt
                                @elseif($bds->trangThai == 'đã duyệt')
                                    Đã duyệt
                                @elseif($bds->trangThai == 'từ chối')
                                    Bị từ chối
                                @elseif($bds->trangThai == 'đã cọc')
                                    Đã cọc
                                @endif
                            </b>
                        </p>

                        <a href="{{ route('batdongsan.edit', $bds->idbds) }}" 
                           class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                    </div>

                </div>
            </div>

        @endforeach

    </div>

@else

    <p> Chưa có bài đăng nào.</p>

@endif

