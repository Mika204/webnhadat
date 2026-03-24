@extends('layouts.adminapp')

@section('content')

<div class="form-container">

<h2>Thêm Khu Vực</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('admin.khuvuc.store') }}">

@csrf

<label>Tên khu vực:</label>

<input type="text" name="tenKv" placeholder="Nhập tên khu vực..." required>

<br><br>

<button type="submit">Thêm</button>

</form>

<br>

<a href="{{ route('admin.khuvuc.index') }}">← Quay lại</a>

</div>

@endsection
