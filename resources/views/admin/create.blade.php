@extends('layouts.app') 
{{-- hoặc layout bạn đang dùng --}}

@section('content')
    <h2>Thêm bất động sản mới</h2>

    <form method="POST" action="{{ route('batdongsan.store') }}">
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

        <button type="submit">Thêm mới</button>
    </form>
@endsection
