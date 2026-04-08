<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Thông tin tài khoản</h5>

    <button type="submit" form="profileForm" class="btn btn-primary">
      Lưu thay đổi
    </button>
  </div>

  <div class="card-body">

    <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
      @csrf

      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label">Họ và tên</label>
          <input type="text" name="hoten" class="form-control"
            value="{{ $user->hoten }}" placeholder="Nhập họ và tên">
        </div>

        <div class="col-md-6">
          <label class="form-label">Số điện thoại</label>
          <input type="tel" name="sdt" class="form-control"
            value="{{ $user->sdt }}" placeholder="Nhập số điện thoại">
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control"
            value="{{ $user->email }}" readonly>
        </div>

        <div class="col-md-6">
          <label class="form-label">Địa chỉ</label>
          <input type="text" name="diachi" class="form-control"
            value="{{ $user->diachi }}" placeholder="Nhập địa chỉ">
        </div>

        <div class="col-md-6">
          <label class="form-label">Mật khẩu mới</label>
          <input type="password" name="password" class="form-control"
            placeholder="Đổi mật khẩu">
        </div>

        <div class="col-md-6">
          <label class="form-label">Xác nhận mật khẩu mới</label>
          <input type="password" name="confirm" class="form-control"
            placeholder="Nhập lại mật khẩu mới">
        </div>

      </div>

    </form>

    @if(session('success'))
      <div class="alert alert-success text-center mt-3">
        {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger text-center mt-3">
        {{ session('error') }}
      </div>
    @endif

  </div>
</div>