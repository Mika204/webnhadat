@extends('layouts.adminapp')

@section('content')
<h2>Thêm bất động sản mới</h2>

<form method="POST" action="{{ route('admin.batdongsan.store') }}" enctype="multipart/form-data">
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
        <label for="moTa">Mô tả:</label>
        <textarea id="moTa" name="moTa"></textarea>
    </div>

    <div>
        <label for="hinhanh">Hình ảnh:</label>
        <input type="file" name="hinhanh[]" multiple>
    </div>

    <button type="submit">Thêm mới</button>
</form>

@endsection
