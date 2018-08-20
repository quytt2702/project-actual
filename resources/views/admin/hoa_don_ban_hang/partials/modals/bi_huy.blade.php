<div id="trang_thai_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chuyển trạng thái đơn hàng</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="code" value="{{ $id }}">
        <div class="form-group">
          <div class="radio radio-custom">
            <input type="radio" id="radio1" name="trangThaiBiHuy" value="Khách hàng đã nhận hàng, đơn hàng thành công" data-code="1" checked>
            <label for="radio1">Khách hàng đã nhận hàng, đơn hàng thành công</label>
          </div>
          <div class="radio radio-custom m-t-10">
            <input type="radio" id="radio2" name="trangThaiBiHuy" value="Giao hàng không được và đã hoàn kho" data-code="2">
            <label for="radio2">Giao hàng không được và đã hoàn kho</label>
          </div>
        </div>
        <div class="collapse collapse_modal">
          <div class="form-group">
            <span>Lý do</span>
            <input class="form-control" id="ly_do">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnXacNhanBiHuy" data-dismiss="modal">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
