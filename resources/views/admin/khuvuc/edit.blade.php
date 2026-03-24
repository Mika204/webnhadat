@extends('layouts.adminapp')

@section('content')

<div class="form-container">

<h2>Sửa Khu Vực</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif


@if($khuvuc)

<form method="POST" action="{{ route('admin.khuvuc.update',$khuvuc->idKv) }}">

@csrf
@method('PUT')

<input type="hidden" name="idKv" value="{{ $khuvuc->idKv }}">

<label>Tên khu vực:</label>

<input type="text"
       name="tenKv"
       value="{{ $khuvuc->tenKv }}"
       placeholder="Nhập tên khu vực..."
       required>

<br><br>

<button type="submit">Cập nhật</button>

</form>

@else

<p>Không tìm thấy khu vực để sửa.</p>

@endif

<br>

<a href="{{ route('admin.khuvuc.index') }}">← Quay lại</a>

</div>

@endsection
