@extends('layouts.adminapp')

@section('content')
<h2>Thêm Khu vực mới</h2>

<form method="POST" action="{{ route('admin.khuvuc.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-semibold">Tên khu vực:</label>
        <input type="text" name="tenKv" class="form-control" value="{{ old('tenKv') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="{{ route('admin.khuvuc.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
