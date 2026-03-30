@extends('layouts.app')

@section('content')

<h2>Đăng tin bất động sản</h2>

<form method="POST" action="{{ route('batdongsan.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="tenBds">Tên bất động sản:</label>
        <input type="text" id="tenBds" name="tenBds" required>
    </div>

    <div>
        <label for="gia">Giá (VNĐ):</label>
        <input type="number" id="gia" name="gia" required>
    </div>

    <div>
        <label for="idKv">Khu vực:</label>
        <select id="idKv" name="idKv" required>
            @foreach($khuvucs as $kv)
                <option value="{{ $kv->idKv }}">{{ $kv->tenKv }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Địa chỉ</label>
        <input type="text" name="diaChi" class="form-control">
    </div>

    <div>
        <label for="moTa">Mô tả:</label>
        <textarea id="moTa" name="moTa"></textarea>
    </div>

    <div>
        <label for="hinhanh">Hình ảnh:</label>
        <input type="file" name="hinhanh[]" multiple>
    </div>

    <br>

    <button type="submit">Đăng tin</button>
</form>
<a href="{{ route('profile.index') }}">← Quay lại</a>
@endsection
