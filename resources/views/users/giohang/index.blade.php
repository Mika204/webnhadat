@extends('layouts.app')

@section('title', 'Giỏ hàng của bạn')

@section('content')
<h1>Giỏ hàng của bạn</h1>

<main class="shopping-cart">
  <div class="cart-main">
    @if($giohang->isEmpty())
      <p class="empty-message">Giỏ hàng của bạn đang trống.</p>
    @else
      <table class="cart-table">
        <thead>
          <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($giohang as $item)
          <tr>
            <td class="product-cell">
              <img src="{{ asset('HINH/' . $item->batdongsan->hinhAnh) }}" 
                   alt="{{ $item->batdongsan->tenBDS }}">
              <div>{{ $item->batdongsan->tenBDS }}</div>
            </td>
            <td class="price-cell">
              {{ number_format($item->batdongsan->gia, 0, ',', '.') }}đ
            </td>
            <td>
              <form method="POST" action="{{ route('giohang.remove', $item->batdongsan->idbds) }}"
                    onsubmit="return confirm('Xóa bất động sản này khỏi giỏ hàng?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="clear-cart"> Xóa</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <div class="cart-side">
    <h2 class="summary-title">Tóm tắt đơn hàng</h2>
    <div class="summary-row">
      <span>Tổng sản phẩm:</span>
      <span>{{ $giohang->count() }}</span>
    </div>
    <div class="summary-row summary-total">
      <span>Tổng cộng:</span>
      <span>
        <?php 
          $total_amount = 0;
          foreach($giohang as $item){
              $total_amount += $item->batdongsan->gia;
          }
        ?>
        {{ number_format($total_amount, 0, ',', '.') }} VND
      </span>
    </div>

    @if(!$giohang->isEmpty())
      <a href="{{ route('checkout.index') }}" class="checkout-btn">Tiến hành đặt cọc</a>

      <form method="POST" action="{{ route('giohang.clear') }}"
            onsubmit="return confirm('Xóa tất cả bất động sản khỏi giỏ hàng?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="clear-cart">Xóa giỏ hàng</button>
      </form>
    @endif

    <a href="{{ route('home') }}" class="continue-shopping">← Quay về trang chủ</a>
  </div>
</main>
@endsection
