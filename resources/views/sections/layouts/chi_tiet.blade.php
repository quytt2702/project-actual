<style type="text/css" media="screen">
  .tab-pane {
    opacity: 1;
    float: left;
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-top: 20px;
  }

  .tab-pane p {
    color: #000000;
    font-size: 18px;
  }

  ol li {
    padding: 7px;
  }

  ul.nav.customtab.nav-tabs {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    float: left;
    width: 100%;
    padding-top: 32px;
    font-size: 22px;
    margin-right: 0px;
    padding-bottom: 3px;
  }

  li.active {-webkit-text-decoration-line: underline;text-decoration-line: underline;}

  li {
    margin-right: 20px;
  }

  .active {
    text-decoration: none !important;
  }

  .presentation {
    margin: 0 0 8px 0;
  }

  .tab-menu-head {
    padding: 8px 16px;
    background-color: #ecf0f1;
  }

  .active > .tab-menu-head {
    background-color: #2c3e50;
    color: #ecf0f1 !important;
    -webkit-box-shadow: 0px 5px 20px rgba(0,0,0,0.4);
            box-shadow: 0px 5px 20px rgba(0,0,0,0.4);
  }

  .tab-pane {
    margin-top: 10px;
  }

  a:hover {
    color: initial;
  }

  div#tab1 {}

  .tab-content {
    width: 100%;
  }

  .tab-pane p {
    margin: 3px 7px;
    font-size: 18px;
    font-family: lato;
  }

  .active a {
    color: #33CCCC;
  }

  a {
    color: #171717;
  }

  .san-pham__tab {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }
  .san-pham__tab > li {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    width: 100%;
  }
  .san-pham__tab > li > a {
    text-align: center;
    display: block;
    width: 100%;
  }

  @media (max-width: 1199px) {
    .san-pham__tab {
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
    }
  }

  @media (max-width: 768px) {
    .san-pham__tab {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
    }
  }
</style>

<!-- Single Product -->
<div class="single_product">
  <div class="container">
    <div style="display: flex;">
      <!-- Selected Image -->
      <input type="hidden" id="id_san_pham" value="{{ $sanPham->id }}">
      <div class="col-lg-5 order-lg-2 order-1">
        <div class="image_selected"><img src="{{ $sanPham->san_pham_hinh_dai_dien }}" alt=""></div>
      </div>

      <!-- Description -->
      <div class="col-lg-7 order-3">
        <div class="product_description">
          <div class="product_category"></div>
          <div class="product_name">{{ $sanPham->san_pham_ten }}</div>
          <div class="product_text"><p>{!! $sanPham->san_pham_mo_ta !!}</p></div>
          <div class="order_info d-flex flex-row">
            <form action="#">
              <div class="clearfix" style="z-index: 1000;">

                <!-- Product Quantity -->
                <div class="product_quantity clearfix">
                  <span>Số lượng: </span>
                  <input id="quantity_input" type="text" pattern="[0-9]*" value="{{ $soLuong }}">
                  <div class="quantity_buttons">
                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                  </div>
                </div>

                <!-- Product Color -->
{{--                 <ul class="product_color">
                  <li>
                    <span>Color: </span>
                    <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                    <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                    <ul class="color_list">
                      <li><div class="color_mark" style="background: #999999;"></div></li>
                      <li><div class="color_mark" style="background: #b19c83;"></div></li>
                      <li><div class="color_mark" style="background: #000000;"></div></li>
                    </ul>
                  </li>
                </ul> --}}

              </div>

              <div class="product_price">{{ number_format($sanPham->san_pham_gia_ban_thuc_te) }} VND</div>
              <div class="button_container">
                <button id="btnThemVaoGioHang" type="button" class="button cart_button">Thêm vào giỏ hàng</button>
                <div class="product_fav"><i class="fas fa-heart"></i></div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">
      <ul class="san-pham__tab nav customtab nav-tabs" role="tablist" style="border-bottom: none;">
        @php
        $index = 1;
        @endphp
        @foreach($tabs as $item)
          @if($item->is_open==='YES')
          <li class="{{ ($index === 1) ? 'active':'' }} presentation">
            <a class="tab-menu tab-menu-head" href="#tab{{$item->id}}" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="{{ ($index++ === 1) ? 'true':'false' }}" style="text-decoration: none;">
              <span class="visible-xs"><i class="ti-home"></i></span>
              <span class="hidden-xs" style="font-size: 18px;">{{ $item->ten_tab }}</span>
            </a>
          </li>
          @endif
        @endforeach
      </ul>
      <div class="tab-content">
        @php
          $index = 1;
          $noiDung = [
            $sanPham->san_pham_noi_dung_tab_1,
            $sanPham->san_pham_noi_dung_tab_2,
            $sanPham->san_pham_noi_dung_tab_3,
            $sanPham->san_pham_noi_dung_tab_4,
            $sanPham->san_pham_noi_dung_tab_5
          ]
        @endphp
        @foreach($tabs as $item)
          @if($item->is_open==='YES')
            <div role="tabpanel" class="tab-pane {{ ($index++ === 1 ) ? 'active':'' }}" id="tab{{$item->id}}">
              {{-- <div style="padding: 12px; color: 828282; font-size: 18px; font-family: inherit !important;"> --}}
                {!! $noiDung[$item->id -1] !!}
              {{-- </div> --}}
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
<script>
  $('#btnThemVaoGioHang').on('click', function () {
    var payload = {
      so_luong: $('#quantity_input').val(),
      id_san_pham: $('#id_san_pham').val(),
    }

    console.log(payload);

    axios.post('gio-hang', payload)
      .then(function (res) {
        displayMessage(res);
      }).catch(function (err) {
        displayError(err);
      });

    console.log('Đang chạy [btnThemVaoGioHang] ' + ' ' + id_san_pham);
  });
</script>
