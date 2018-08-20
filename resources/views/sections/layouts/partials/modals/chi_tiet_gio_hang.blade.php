<div id="chi_tiet_thanh_toan_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close dimissModal" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chi tiết thanh toán giỏ hàng</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h3>Thông tin của bạn</h3>
          </div>
        </div>
        <div class="row" style="color: black !important;">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Họ và tên</label>
              <input type="text" id="ho_ten" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="text" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label class="control-label">Số điện thoại</label>
              <input type="text" id="sdt" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
              <label class="control-label">Phương thức thanh toán</label>
              <div class="row">
                <div class="col-md-6">
                  <label class="radio-inline">
                    <input type="radio" name="phuong_thuc_thanh_toan" value="COD">  Thanh Toán COD
                  </label>
                </div>
                <div class="col-md-6">
                  <label class="radio-inline">
                    <input type="radio" name="phuong_thuc_thanh_toan" value="ONLINE">  Thanh Toán Online
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Thành phố</label>
              <select style="margin:0;" id="thanh_pho" class="form-control">
                @foreach($tinhThanh as $item)
                <option value='{{ $item->provinceid }}'>{{ "$item->type $item->name" }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Quận/huyện</label>
              <select style="margin:0;" class="form-control" id="quan_huyen">
                <option></option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Phường</label>
              <select style="margin:0;" class="form-control" id="phuong">
                <option></option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Đường</label>
              <input type="text" id="duong" class="form-control" placeholder="Đường">
            </div>
          </div>
        </div>
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
                      <td style="text-align: right; border-left: none;" id="tong_tien_don_hang">{{ number_format($tongTien) }} VND</td>
                    </tr>
                    <tr>
                      <td>Phí ship</td>
                      <td style="text-align: right; border-left: none;" id="phi_ship"></td>
                    </tr>
                    <tr>
                      <td class="text-danger" style="font-weight: bold;">Tổng tiền</td>
                      <td id="tong_tien" style="text-align: right; border-left: none; font-weight: bold;"></td>
                    </tr>
                  </tbody>
                </table>
                <p id="chuc_nang_cap_nhat" class="text-danger">Chức năng này đang cập nhật</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect dimissModal" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light dimissModal" id="btnXacNhanThanhToan" data-dismiss="modal">Thanh toán</button>
      </div>
    </div>
  </div>
</div>
<script>
  function tinhTongTien(chon) {
    const tongTienDonHang = {{ $tongTien }};
    const phiShipCOD      = {{ $caiDat->phi_ship_cod }};
    const phiShipOnline   = {{ $caiDat->phi_ship_ngan_luong }};

    console.log('tinhTongTien');

    var phi_ship = 0;
    if (chon === 'COD') {
      phi_ship = phiShipCOD;
      $('#chuc_nang_cap_nhat').css('visibility', 'hidden');
      $('#btnXacNhanThanhToan').prop('disabled', false);

    } else if (chon == 'ONLINE') {
      phi_ship = phiShipOnline;
      $('#chuc_nang_cap_nhat').css('visibility', 'visible');
      $('#btnXacNhanThanhToan').prop('disabled', true);
    }

    var tongTien = tongTienDonHang + phi_ship;

    $('#phi_ship').html(window.number_format(phi_ship, 0) + ' VND');
    $('#tong_tien').html(window.number_format(tongTien, 0) + ' VND');
  }

  $('input[type=radio][name=phuong_thuc_thanh_toan]').change(function() {
   $('.collapse').collapse('show');
   tinhTongTien($(this).val());
 });

  $('#btnXacNhanThanhToan').on('click', function () {
    console.log('Đã bấm [btnXacNhanThanhToan]');

    const payload = {
      ho_ten                 : $('#ho_ten').val(),
      email                  : $('#email').val(),
      sdt                    : $('#sdt').val(),
      phuong_thuc_thanh_toan : $('input[name=phuong_thuc_thanh_toan]:checked').val(),
      thanh_pho              : $('#thanh_pho').val(),
      quan_huyen             : $('#quan_huyen').val(),
      phuong                 : $('#phuong').val(),
      duong                  : $('#duong').val(),
    }

    console.log(payload);

    axios.post('gio-hang/thanh-toan', payload)
    .then(res => {
      displayMessage(res);
    }).catch(err => {
      displayErrors(err);
    });

  });

  $('body').on('change', '#thanh_pho', function () {
    var hash = $(this).val();
    console.log('Đang thay đổi [thanh_pho]');
    axios.get(`/dia-chi/add/quan/${hash}`)
      .then(res => {
        $('#quan_huyen').html(res.data);
        $('#quan_huyen').trigger('change');
      }).catch(err => {
        displayErrors(err);
      })
  });

  $('body').on('change', '#quan_huyen', function() {
    var hash = $(this).val();
    console.log('Đang thay đổi [quan_huyen]');
    axios.get(`/dia-chi/add/phuong/${hash}`)
      .then(res => {
        $('#phuong').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#thanh_pho').trigger('change');
</script>
