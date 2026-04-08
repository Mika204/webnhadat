@extends('layouts.app')

@section('content')

<div class="container py-5 animate-up">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-premium-card">
                <h2 class="form-section-title">Chỉnh sửa bất động sản</h2>
                <p class="text-secondary mb-4">Cập nhật thông tin chính xác để tối ưu hiệu quả tìm kiếm khách hàng.</p>

                <form method="POST" action="{{ route('batdongsan.update', $bds->idbds) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="tenBds" class="form-label-premium">Tên bất động sản</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:pen-new-square-linear" width="20"></iconify-icon>
                            </span>
                            <input type="text" id="tenBds" name="tenBds" class="form-control" value="{{ $bds->tenBds }}" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="gia" class="form-label-premium">Giá (VNĐ)</label>
                            <div class="input-group input-group-premium">
                                <span class="input-group-text">
                                    <iconify-icon icon="solar:wad-of-money-linear" width="20"></iconify-icon>
                                </span>
                                <input type="number" id="gia" name="gia" class="form-control" value="{{ $bds->gia }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <label for="idKv" class="form-label-premium">Khu vực</label>
                            <div class="input-group input-group-premium">
                                <span class="input-group-text">
                                    <iconify-icon icon="solar:map-point-linear" width="20"></iconify-icon>
                                </span>
                                <select id="idKv" name="idKv" class="form-select" required>
                                    @foreach($khuvucs as $kv)
                                        <option value="{{ $kv->idKv }}" {{ $bds->idKv == $kv->idKv ? 'selected' : '' }}>
                                            {{ $kv->tenKv }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="diaChi" class="form-label-premium">Địa chỉ chi tiết</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:streets-navigation-linear" width="20"></iconify-icon>
                            </span>
                            <input type="text" id="diaChi" name="diaChi" class="form-control" value="{{ $bds->diaChi }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="moTa" class="form-label-premium">Mô tả chi tiết</label>
                        <div class="input-group input-group-premium" style="align-items: flex-start;">
                            <span class="input-group-text mt-2">
                                <iconify-icon icon="solar:notes-linear" width="20"></iconify-icon>
                            </span>
                            <textarea id="moTa" name="moTa" class="form-control" rows="5">{{ $bds->moTa }}</textarea>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label-premium">Hình ảnh hiện tại</label>
                        <div class="image-preview-container">
                            @foreach($bds->hinhanhs as $img)
                                <div class="image-preview-item">
                                    <img src="{{ asset('storage/' . $img->duong_dan_anh) }}" alt="Preview">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="hinhanh" class="form-label-premium">Thêm hình ảnh mới</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:gallery-upload-linear" width="20"></iconify-icon>
                            </span>
                            <input type="file" id="hinhanh" name="hinhanh[]" class="form-control" multiple>
                        </div>
                        <small class="text-muted mt-2 d-block">Chọn ảnh mới sẽ được thêm vào danh sách ảnh hiện có.</small>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-5">
                        <a href="{{ route('profile.index') }}" class="text-secondary text-decoration-none">
                            <iconify-icon icon="solar:alt-arrow-left-linear" style="vertical-align: middle;"></iconify-icon> Quay lại
                        </a>
                        <button type="submit" class="btn-premium">
                            Cập nhật thay đổi <iconify-icon icon="solar:refresh-linear" style="vertical-align: middle; margin-left: 5px;"></iconify-icon>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
