@extends('layouts.app')

@section('content')

<div class="container py-4 animate-up">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="form-premium-card">
                <h2 class="form-section-title">Đăng tin bất động sản</h2>
                <p class="text-secondary mb-3">Chia sẻ thông tin tài sản của bạn để tiếp cận khách hàng.</p>

                <form method="POST" action="{{ route('batdongsan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label-premium">Tên bất động sản</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:pen-new-square-linear"></iconify-icon>
                            </span>
                            <input type="text" name="tenBds" class="form-control" placeholder="Tên BĐS" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label-premium">Giá</label>
                            <div class="input-group input-group-premium">
                                <span class="input-group-text">
                                    <iconify-icon icon="solar:wad-of-money-linear"></iconify-icon>
                                </span>
                                <input type="number" name="gia" class="form-control" placeholder="VNĐ" required>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2 mt-md-0">
                            <label class="form-label-premium">Khu vực</label>
                            <div class="input-group input-group-premium">
                                <span class="input-group-text">
                                    <iconify-icon icon="solar:map-point-linear"></iconify-icon>
                                </span>
                                <select name="idKv" class="form-select" required>
                                    <option disabled selected>Chọn</option>
                                    @foreach($khuvucs as $kv)
                                        <option value="{{ $kv->idKv }}">{{ $kv->tenKv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-premium">Địa chỉ</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:streets-navigation-linear"></iconify-icon>
                            </span>
                            <input type="text" name="diaChi" class="form-control" placeholder="Địa chỉ..." required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-premium">Mô tả</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text mt-1">
                                <iconify-icon icon="solar:notes-linear"></iconify-icon>
                            </span>
                            <textarea name="moTa" class="form-control" rows="3" placeholder="Mô tả..."></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-premium">Hình ảnh</label>
                        <div class="input-group input-group-premium">
                            <span class="input-group-text">
                                <iconify-icon icon="solar:gallery-linear"></iconify-icon>
                            </span>
                            <input type="file" name="hinhanh[]" class="form-control" multiple>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('profile.index') }}" class="text-secondary text-decoration-none">
                            ← Quay lại
                        </a>
                        <button type="submit" class="btn-premium">
                            Đăng tin
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
