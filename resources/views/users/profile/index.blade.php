@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@if(session('info'))
    <p style="color:blue">{{ session('info') }}</p>
@endif
<div class="container mt-4">
    <div class="row  align-items-start">
  
      <!-- MENU BÊN TRÁI -->
      <aside class="col-md-2 border-end pt-3 bg-white">
  
        <nav class="nav flex-md-column flex-row p-3 gap-2 overflow-auto">
  
          <button onclick="switchTab('account')" id="nav-account"
            class="btn btn-light border text-start d-flex align-items-center gap-2">
            <iconify-icon icon="solar:user-circle-linear"></iconify-icon>
            Thông tin tài khoản
          </button>
  
          <button onclick="switchTab('deposits')" id="nav-deposits"
            class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
            <iconify-icon icon="solar:wallet-money-linear"></iconify-icon>
            Lịch sử đặt cọc nhà
          </button>
  
          <button onclick="switchTab('posts')" id="nav-posts"
            class="btn btn-outline-secondary text-start d-flex align-items-center gap-2">
            <iconify-icon icon="solar:home-2-linear"></iconify-icon>
            Tin đăng nhà đất
          </button>
  
        </nav>
  
        <div class="p-3 border-top">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-light border text-start d-flex align-items-center gap-2 w-100">
              <iconify-icon icon="solar:logout-2-linear"></iconify-icon>
              Đăng xuất
            </button>
          </form>
        </div>
  
      </aside>
  
  
      <!-- NỘI DUNG BÊN PHẢI -->
    <div class="col-md-10 mt-3 mt-md-0">

        <!-- TAB ACCOUNT -->
        <div id="account" class="tab-content active">
            @include('users.profile.account')
        </div>
        <!-- TAB DEPOSITS -->
        <div id="deposits" class="tab-content">
            @include('users.profile.deposits')
        </div>
        
        <!-- TAB POSTS -->
        <div id="posts" class="tab-content">
            @include('users.profile.posts')
        </div>
        
    </div>
        
</div>
<script>

    function switchTab(tab){
    
        // ẩn tất cả tab
        document.querySelectorAll('.tab-content').forEach(function(el){
            el.classList.remove('active');
        });
    
        // hiện tab được chọn
        document.getElementById(tab).classList.add('active');
    
    }
    
</script>
    
  