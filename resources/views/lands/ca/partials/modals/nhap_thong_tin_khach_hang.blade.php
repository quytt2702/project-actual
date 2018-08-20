<!-- Modal step 02 -->
<div class="modal fade" id="chi_tiet_thanh_toan_modal" role="dialog" style="overflow-y: auto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close dimissModal" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-left">Phương thức thanh toán</h4>
      </div>
      <div class="modal-body">
        <h3>Thông tin của bạn</h3>
        <div class="row" style="color: black !important;">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Họ và tên</label>
              <input type="text" id="kh_ho_ten" class="form-control" value="{{ $data['ho_ten'] }}">
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="text" id="kh_email" class="form-control" value="{{ $data['email'] }}">
            </div>
            <div class="form-group">
              <label class="control-label">Số điện thoại</label>
              <input type="text" id="kh_sdt" class="form-control" value="{{ $data['sdt'] }}">
            </div>
            <div class="form-group">
              <label class="control-label">Số lượng</label>
              <input type="number" id="kh_so_luong" class="form-control" value="1">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Thành phố</label>
              <select id="kh_thanh_pho" class="form-control">
                @foreach($tinhThanh as $item)
                <option value='{{ $item->provinceid }}'>{{ "$item->type $item->name" }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Quận/huyện</label>
              <select class="form-control" id="kh_quan_huyen">
                <option></option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Phường</label>
              <select class="form-control" id="kh_phuong">
                <option></option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Đường</label>
              <input type="text" id="kh_duong" class="form-control">
            </div>
          </div>
        </div>
        @if($landingTheme->is_muon_ban === App\Entities\Landing\LandingTheme::IS_MUON_BAN['YES'])
        <div class="form-group">
          <label class="control-label">Phương thức thanh toán</label>
          <div class="row">
            <div class="col-md-6">
              <label class="radio-inline">
                <input type="radio" name="kh_phuong_thuc_thanh_toan" value="COD">  COD
              </label>
            </div>
            <div class="col-md-6">
              <label class="radio-inline">
                <input type="radio" name="kh_phuong_thuc_thanh_toan" value="ONLINE">  Online
              </label>
            </div>
          </div>
        </div>
        @endif
        <div class="collapse">
          <hr>
          <div class="row">
            <div class="col-md-12">
              <h3>Thông tin thanh toán</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>Tổng tiền đơn hàng</td>
                      <td style="text-align: right; border-left: none;" id="tong_tien_don_hang">{{ number_format($sanPham->san_pham_gia_ban_thuc_te) }} VND</td>
                    </tr>
                    <tr>
                      <td>Phí ship</td>
                      <td style="text-align: right; border-left: none;" id="phi_ship"></td>
                    </tr>
                    <tr>
                      <td class="text-danger" style="font-weight: bold;">Tổng tiền</td>
                      <td id="kh_tong_tien" style="text-align: right; border-left: none; font-weight: bold;"></td>
                    </tr>
                  </tbody>
                </table>
                <p id="kh_chuc_nang_cap_nhat" class="text-danger">Chức năng này đang cập nhật</p>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <button type="button" class="btn btn-default dimissModal" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-success dimissModal" data-dismiss="modal" id="btnXacNhanThanhToan">Thanh Toán</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal step 02 -->

<script>
  window.number_format = function (number, decimals, dec_point = '.', thousands_sep = ',') {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }

  function tinhTongTien(chon) {
    const gia             = {{ $sanPham->san_pham_gia_ban_thuc_te }};
    const phiShipCOD      = {{ $caiDat->phi_ship_cod }};
    const phiShipOnline   = {{ $caiDat->phi_ship_ngan_luong }};

    console.log('tinhTongTien');

    var phi_ship = 0;
    if (chon === 'COD') {
      phi_ship = phiShipCOD;
      $('#kh_chuc_nang_cap_nhat').css('visibility', 'hidden');
      $('#btnXacNhanThanhToan').prop('disabled', false);

    } else if (chon == 'ONLINE') {
      phi_ship = phiShipOnline;
      $('#kh_chuc_nang_cap_nhat').css('visibility', 'visible');
      $('#btnXacNhanThanhToan').prop('disabled', true);
    }

    var tongTien = gia + phi_ship;

    $('#phi_ship').html(window.number_format(phi_ship, 0) + ' VND');
    $('#kh_tong_tien').html(window.number_format(tongTien, 0) + ' VND');
  }

  $('input[type=radio][name=kh_phuong_thuc_thanh_toan]').change(function() {
   $('.collapse').collapse('show');
   tinhTongTien($(this).val());
 });

  $('#btnXacNhanThanhToan').on('click', function () {
    console.log('Đã bấm [btnXacNhanThanhToan]');

    const payload = {
      _token                : '{{ csrf_token() }}',
      url                   : window.location.pathname,
      ho_ten                : $('#kh_ho_ten').val(),
      email                 : $('#kh_email').val(),
      sdt                   : $('#kh_sdt').val(),
      phuong_thuc_thanh_toan: $('input[name=kh_phuong_thuc_thanh_toan]:checked').val(),
      thanh_pho             : $('#kh_thanh_pho').val(),
      quan_huyen            : $('#kh_quan_huyen').val(),
      phuong                : $('#kh_phuong').val(),
      duong                 : $('#kh_duong').val(),
      so_luong              : $('#kh_so_luong').val(),
    }

    console.log(payload);

    $.ajax({
      method: 'POST',
      url: '/khach-hang/thanh-toan',
      data: payload
    }).done(function (res) {
      swal(res.title, res.message, res.icon);
    }).fail(function (err) {
      swal(res.title, res.message, res.icon);
    });

  });

  $('body').on('change', '#kh_thanh_pho', function () {
    var hash = $(this).val();
    console.log('Đang thay đổi [kh_thanh_pho]');

    $.ajax({
      method: 'GET',
      url: `/dia-chi/add/quan/${hash}`,
    }).done(function (res) {
        $('#kh_quan_huyen').html(res);
        $('#kh_quan_huyen').trigger('change');
    });
  });

  $('body').on('change', '#kh_quan_huyen', function() {
    var hash = $(this).val();
    console.log('Đang thay đổi [kh_quan_huyen]');

    $.ajax({
      method: 'GET',
      url: `/dia-chi/add/phuong/${hash}`,
    }).done(function (res) {
      $('#kh_phuong').html(res);
    });
  });

  $('#kh_thanh_pho').trigger('change');
</script>

