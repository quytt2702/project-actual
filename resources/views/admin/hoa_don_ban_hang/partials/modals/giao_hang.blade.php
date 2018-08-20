<div id="trang_thai_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chuyển trạng thái đơn hàng</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="radio radio-custom m-t-10" style="{{ ($hoaDonBanHang->trang_thai === 'GIAO KHONG DUOC') ? 'display: none;':''}}">
            <input type="radio" name="phuong_thuc_van_chuyen" id="radio1" value="1" checked>
            <label for="radio1">Khách hàng đã nhận hàng, đơn hàng thành công</label>
          </div>
          <div class="radio radio-custom">
            <input type="radio" name="phuong_thuc_van_chuyen" id="radio2" value="2" {{ ($hoaDonBanHang->trang_thai === 'GIAO KHONG DUOC') ? 'checked':''}}>
            <label for="radio2">Chuyển cho đơn vị vận chuyển</label>
          </div>
          <div class="radio radio-custom">
            <input type="radio" name="phuong_thuc_van_chuyen" id="radio3" value="3" {{ ($hoaDonBanHang->trang_thai === 'ADMIN HUY DON HANG') ? 'checked':''}}>
            <label for="radio3">Admin huỷ đơn hàng</label>
          </div>
        </div>
        @if (!empty($hoaDonBanHang->ghi_chu) || $hoaDonBanHang->ghi_chu === '')
        <div class="form-group">
          <span>Lý do không chuyển được: <span class="text-danger">{{ $hoaDonBanHang->ghi_chu }}</span></span>
        </div>
        @endif
        <div class="collapse collapse_don_vi_van_chuyen_modal">
          <div class="form-group">
            <input type="text" id="ma_van_don" class="form-control" placeholder="Nhập vào mã vận đơn">
          </div>
          <div class="form-group">
            <label>Chọn đơn vị vận chuyển</label>
            <select id="don_vi_van_chuyen" class="form-control">
              @foreach($phuongThucVanChuyen as $item)
              <option>{{ $item }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="collapse collapse_ly_do_modal">
          <label>Nhập vào lý do</label>
          <div class="form-group">
            <input type="text" id="ly_do" class="form-control" placeholder="Nhập vào lý do">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnXacNhanGiaoHang" data-dismiss="modal"  data-code="{{ $id }}">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
