@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Chi tiết sản phẩm')
@section('master.content')
<div class="row m-t-30">
  <div class="col-lg-12">
    <div class="white-box">
      <div>
        <h4 class="m-b-0 m-t-0"><b>Mã sản phẩm: </b><span class="text-primary"><b>{{ $sanPham->san_pham_ma }}</b></span></h4>
        <hr>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="white-box text-center">
              <img src="{{ $sanPham->san_pham_hinh_dai_dien }}" class="img-responsive">
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-6">
            <h4 class="m-b-0 m-t-0"><b>Tên sản phẩm: </b><span class="text-primary"><b>{{ $sanPham->san_pham_ten }}</b></span></h4>
            <h4 class="m-t-10"><b>Mô tả: </b></h4>
            <div>{!! $sanPham->san_pham_mo_ta !!}</div>
            <h2 class="m-t-40">{{ number_format($sanPham->san_pham_gia_ban_thuc_te / $sanPham->ti_gia_milk) }} MILK <small class="text-danger">({{ number_format($sanPham->san_pham_gia_ban_thuc_te) }} VND)</small></h2>
            <button id="btnGioHang" class="btn btn-inverse btn-rounded m-r-5" data-toggle="tooltip" title="" data-original-title="Bỏ vào giỏ hàng"><i class="ti-shopping-cart"></i> Giỏ hàng</button>
            <button id="btnThanhToan" class="btn btn-danger btn-rounded" data-toggle="tooltip" title="" data-original-title="Thanh toán"><i class="fa fa-credit-card-alt"></i> Thanh Toán</button>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="white-box">
                <!-- Nav tabs -->
                <ul class="nav customtab nav-tabs" role="tablist">
                  @php
                    $index = 1;
                  @endphp
                  @foreach($tabs as $item)
                    @if($item->is_open === 'YES')
                      <li role="presentation" class="{{ ($index++ === 1) ? 'active':'' }}"><a href="#{{ $item->id }}" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true" style="font-size: 16px"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">{{ $item->ten_tab }}</span></a></li>
                    @endif
                  @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  @php
                    $index = 1;
                  @endphp
                  @foreach($tabs as $item)
                    @if($item->is_open === 'YES')
                      <div role="tabpanel" class="tab-pane fade {{ ($index++ === 1) ? 'active':'' }} in" id="{{ $item->id }}">
                        <div class="col-md-12">
                          @if ($item->id === 1)
                            {!! $sanPham->san_pham_noi_dung_tab_1 !!}
                          @elseif ($item->id === 2)
                            {!! $sanPham->san_pham_noi_dung_tab_2 !!}
                          @elseif ($item->id === 3)
                            {!! $sanPham->san_pham_noi_dung_tab_3 !!}
                          @elseif ($item->id === 4)
                            {!! $sanPham->san_pham_noi_dung_tab_4 !!}
                          @else
                            {!! $sanPham->san_pham_noi_dung_tab_5 !!}
                          @endif
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
