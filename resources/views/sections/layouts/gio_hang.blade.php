<style>
  .cart_item_text {
    padding: 40px 15px !important;
  }
</style>
<div id="modal"></div>
<div class="cart_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="cart_container">
          <div class="cart_title">Giỏ hàng</div>
          <div class="cart_items">
            <div class="col-md-12" style="border: solid 1px #e8e8e8; box-shadow: 0px 1px 5px rgba(0,0,0,0.1);">
              <table class="table hidden-sm">
                <thead>
                  <tr>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Hình sản phẩm</th>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Tên sản phẩm</th>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Số lượng</th>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Giá bán</th>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Tổng tiền</th>
                    <th class="cart_item_title text-center" style="font-size: 14px; padding-top: 20px;">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @if (empty($listSanPham))
                  <tr>
                    <td colspan="6" class="text-center" style="font-size: 24px; color: #2c3e50;">Không có sản phẩm nào</td>
                  </tr>
                  @else
                  @php
                  $index = 0;
                  $tongGia = 0;
                  $tongGiaSanPham = 0;
                  @endphp
                  @foreach($listSanPham as $item)
                  <tr>
                    <td class="cart_item_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></td>
                    <td class="cart_item_text" style="white-space: nowrap; overflow: hidden; max-width: 300px; text-overflow: ellipsis; font-size: 14px; font-weight: 100;"><i>{{ $item->san_pham_ten }}</i></td>
                    <td class="cart_item_text">
                      @php
                      $tongGiaSanPham = $listSanPhamKey[$item->san_pham_id]->so_luong * $item->san_pham_gia_ban_thuc_te;
                      $tongGia += $tongGiaSanPham;
                      @endphp
                      <input type="number" class="so_luong text-right" style="max-width: 60px !important;" value="{{ $listSanPhamKey[$item->san_pham_id]->so_luong }}" data-code="{{ $item->san_pham_id }}" data-gia="{{ $item->san_pham_gia_ban_thuc_te }}" data-index={{ $index++ }}>
                    </td>
                    <td class="cart_item_text text-nowrap text-right">{{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</td>
                    <td class="cart_item_text text-nowrap text-right tong_gia_san_pham">{{ number_format($tongGiaSanPham) }} VND</td>
                    <td class="cart_item_text text-nowrap text-center">
                      <button type="button" class="btn btn-danger btnXoa" data-code="{{ $item->san_pham_id }}">Xoá</button>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>

              <div class="cart__wrapper">
                <ul class="cart__item-list">
                  @if(empty($listSanPham) || count($listSanPham) === 0)
                  <li class="cart__item">
                    <div class="text-center">Không có sản phẩm nào</div>
                  </li>
                  @else
                  @php
                    $index = 0;
                    $tongGia = 0;
                    $tongGiaSanPham = 0;
                  @endphp
                  @foreach ($listSanPham as $item)
                    @php
                      $tongGiaSanPham = $listSanPhamKey[$item->san_pham_id]->so_luong * $item->san_pham_gia_ban_thuc_te;
                      $tongGia += $tongGiaSanPham;
                    @endphp
                    <li class="cart__item">
                      <div class="cart-item__wrapper">
                        <div class="cart-item__image-container">
                          <img src="{{ $item->san_pham_hinh_dai_dien }}">
                        </div>
                        <div class="cart-item__content">
                          <div class="remove"></div>
                          <span href="/" class="cart-item__name">{{ $item->san_pham_ten }}</span>
                          <div class="cart-item__price">
                            <div class="qty-price">
                              <span class="unit-price">{{ number_format($item->san_pham_gia_ban_thuc_te) }}VND</span>
                            </div>
                            <select class="qty-dropdown" data-code="{{ $item->san_pham_id }}" data-gia="{{ $item->san_pham_gia_ban_thuc_te }}" data-index={{ $index++ }}>
                              @foreach (range(1, 30) as $soLuong)
                                <option value="{{ $soLuong }}" {{ $listSanPhamKey[$item->san_pham_id]->so_luong == $soLuong ? 'selected' : '' }}>{{ $soLuong }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>

          <!-- Order Total -->
          <div class="order_total">
            <div class="order_total_content text-md-right">
              <div class="order_total_title">Tổng thanh toán:</div>
              <div id="tong_gia" class="order_total_amount">{{ number_format(empty($tongGia) ? 0:$tongGia) }} VND</div>
            </div>
          </div>

          <div class="cart_buttons">
            <button type="button" id="btnChonKieuThanhToan" class="button cart_button_checkout">Thanh toán</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var san_pham = [];
  $('.so_luong').on('keyup mouseup focusout', function () {
    console.log('Thay đổi số lượng');

    if ($(this).val() < 1) {
      $(this).val(1);
      return;
    }

    san_pham = [];
    $('.so_luong').each(function () {
      console.log(san_pham);
      san_pham.push({
        san_pham_id      : $(this).data('code'),
        san_pham_so_luong: $(this).val(),
      });
    });

    var tongVND = 0;
    $('.so_luong').each(function () {
      var tongSanPham = $(this).data('gia') * $(this).val();
      $('.tong_gia_san_pham')[$(this).data('index')].innerText = window.number_format(tongSanPham, 0) + ' VND';
      tongVND += tongSanPham;
    });

    $('#tong_gia').html(window.number_format(tongVND, 0) + ' VND');
  });

  $('body').on('click', '#btnChonKieuThanhToan', function () {
    console.log('Đã bấm [btnChonKieuThanhToan]');

    axios.get('/gio-hang/chon-kieu-thanh-toan-modal')
      .then(res => {
          $('#modal').html(res.data);
          $('#chon_kieu_thanh_toan_modal').modal('toggle');
      }).catch(err => {
      });
  });

  $('body').on('click', '#btnThanhToan', function () {
    console.log('Đã bấm [btnThanhToan]');

    const kieu_thanh_toan = $('input[name=kieu_thanh_toan]:checked').val();

    axios.post(`/gio-hang/chi-tiet-thanh-toan-modal/${kieu_thanh_toan}`, san_pham)
      .then(res => {
          if (res.data.type == 1) {
            window.toastr.error(res.data.message);
            setTimeout('window.open("' + window.location.origin + '/cong-tac-vien/login")', 1000);
          } else if (res.data.type == 2) {
            setTimeout('window.location="' + res.data.url + '"', 1000);
          } else {
            $('#modal').html(res.data);
            $('#chi_tiet_thanh_toan_modal').modal('toggle');
          }
        }).catch(err => {
        });
  });

  $('body').on('click', '.btnXoa', function () {
    console.log('Đã bấm [btnXoa]');

    const code = $(this).data('code');

    axios.delete(`/gio-hang/xoa-san-pham/${code}`)
      .then(res => {
        window.location.reload();
      }).catch(err => {

      });

  });

  $('body').on('click', '.dimissModal', function() {
    $('.modal-backdrop.fade.show').remove();
  });
</script>
