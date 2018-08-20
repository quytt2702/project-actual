@if(empty($sanPham) || count($sanPham) === 0)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<h3>Không có sản phẩm nào</h3>
</div>
@else
<style type="text/css">
  .ma-san-pham,
  .ten-san-pham {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .hinh-san-pham {
    width: 100%;
    height: 240px;
    object-fit: contain;
  }
</style>
@foreach($sanPham as $item)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <div class="white-box">
    <div style="text-align: center; position: relative;">
      <img class="hinh-san-pham" style="max-width: 100%" src="{{ $item->san_pham_hinh_dai_dien }}">
    </div>
    <div class="product-text">
      <span class="bg-danger price" style="padding: 11px 0;">{{ number_format($item->san_pham_gia_ban_thuc_te / $item->ti_gia_milk) }}<br>Milk</span>
      <h3 class="box-title m-b-0 m-t-5 ma-san-pham">Mã: {{ $item->san_pham_ma }}</h3>
      <p class="m-b-0 ten-san-pham"><b>Tên:</b> {{ $item->san_pham_ten }}</p>
      <p><b>Giá bán:</b> {{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</p>
      <div class="m-t-10 action__wrapper">
        <div class="action__button">
          <button class="btn btn-info btn-block waves-effect waves-light btnGio" hash="{{ $item->san_pham_id }}">
            <i class="fa fa-shopping-cart"></i> Giỏ
          </button>
        </div>
        <div class="action__button">
          <button class="btn btn-info btn-block waves-effect waves-light btnXem" hash="{{ $item->san_pham_id }}">
            <i class="fa fa-eye"></i> Xem
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif
<div class="col-md-12">
  {!! view_paginate_buttons($sanPham) !!}
</div>
