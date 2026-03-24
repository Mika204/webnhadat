@extends('layouts.app')

@section('content')

<h2> Sửa bất động sản</h2>

<form method="POST" action="{{ route('batdongsan.update', $bds->idbds) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Tên bất động sản:</label>
        <input type="text" name="tenBds" value="{{ $bds->tenBds }}" required>
    </div>

    <div>
        <label>Giá:</label>
        <input type="number" name="gia" value="{{ $bds->gia }}" required>
    </div>

    <div>
        <label>Khu vực:</label>
        <select name="idKv" required>
            @foreach($khuvucs as $kv)
                <option value="{{ $kv->idKv }}"
                    {{ $bds->idKv == $kv->idKv ? 'selected' : '' }}>
                    {{ $kv->tenKv }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Mô tả:</label>
        <textarea name="moTa">{{ $bds->moTa }}</textarea>
    </div>

    <div>
        <label>Hình ảnh hiện tại:</label>
        <br>

        @foreach($bds->hinhanhs as $img)
            <img src="{{ asset('storage/' . $img->duong_dan_anh) }}" width="120">
        @endforeach
    </div>

    <div>
        <label>Thêm hình mới:</label>
        <input type="file" name="hinhanh[]" multiple>
    </div>

    <button type="submit">Cập nhật</button>
</form>

<br>

<a href="{{ route('profile.index') }}">← Quay lại</a>

@endsection
