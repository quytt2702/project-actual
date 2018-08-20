<div id="confirm_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Lí do huỷ bỏ</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="code" value="{{ $id }}">
        <div class="form-group">
          <p>Nhập lý do</p>
          <input id="ly_do" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnXacNhan" data-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>
