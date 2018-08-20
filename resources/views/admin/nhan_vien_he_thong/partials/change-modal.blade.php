<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chỉnh sửa admin</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="email" value="{{ $admin->email }}">
          <div class="form-group">
            <label for="message-text" class="control-label">Họ và tên</label>
            <input class="form-control" id="ho_va_ten_edit" value="{{ $admin->ho_va_ten }}"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau_edit"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau_edit_confirmation"></input>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnLuu" data-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>
