
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

                        @php
                            $isLocked = $bds->datlichhens->whereIn('trangThai', ['đã cọc', 'hoàn thành'])->isNotEmpty();
                        @endphp

                        <p>
                            Trạng thái: 
                            <b>
                                @if($isLocked)
                                    <span class="text-danger"><span class="material-symbols-outlined fs-6">lock</span> Đã khóa (Đã cọc)</span>
                                @elseif($bds->trangThai == 'chờ duyệt')
                                    Chờ duyệt
                                @elseif($bds->trangThai == 'đã duyệt')
                                    <span class="text-success">Đã duyệt</span>
                                @elseif($bds->trangThai == 'từ chối')
                                    Bị từ chối
                                @endif
                            </b>
                        </p>

                        <div class="d-flex gap-2">
                             <a href="{{ route('batdongsan.edit', $bds->idbds) }}" 
                                class="btn btn-warning btn-sm {{ $isLocked ? 'disabled' : '' }}">
                                 Sửa bài
                             </a>
                             <form action="{{ route('batdongsan.destroy', $bds->idbds) }}" method="POST" onsubmit="return confirm('Xóa bài đăng này?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" {{ $isLocked ? 'disabled' : '' }}>Xóa</button>
                             </form>
                        </div>

                        {{-- Danh sách lịch hẹn cho bài đăng này --}}
                        @if($bds->datlichhens->count() > 0)
                            <div class="mt-3 pt-3 border-top">
                                <h6 class="fw-bold small mb-2">Lịch hẹn / Đặt cọc:</h6>
                                <div class="list-group list-group-flush border rounded">
                                    @foreach($bds->datlichhens as $lh)
                                        <div class="list-group-item p-2 small">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span><b>{{ $lh->nguoiMua->hoten ?? 'Khách' }}</b></span>
                                                <span class="text-muted">{{ \Carbon\Carbon::parse($lh->ngayDat)->format('d/m') }}</span>
                                            </div>
                                            <form action="{{ route('datlichhen.update', $lh->id_dat_lich_hen) }}" method="POST">
                                                @csrf @method('PUT')
                                                <select name="trangThai" onchange="this.form.submit()" 
                                                    class="form-select form-select-sm py-0 px-2 rounded-pill 
                                                    @if($lh->trangThai == 'đã cọc') bg-warning-subtle text-warning-emphasis border-warning 
                                                    @elseif($lh->trangThai == 'hoàn thành') bg-success-subtle text-success-emphasis border-success 
                                                    @else bg-secondary-subtle text-secondary-emphasis @endif">
                                                    <option value="đã cọc" {{ $lh->trangThai == 'đã cọc' ? 'selected' : '' }}>Đã cọc</option>
                                                    <option value="hoàn thành" {{ $lh->trangThai == 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                                    <option value="hủy" {{ $lh->trangThai == 'hủy' ? 'selected' : '' }}>Hủy</option>
                                                </select>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p> Chưa có bài đăng nào.</p>
@endif