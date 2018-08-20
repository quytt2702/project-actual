<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Đổi tên nhóm quyền</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="idNhomQuyen" value="{{ $nhomQuyen->id }}">
          <div class="form-group">
            <label for="message-text" class="control-label">Tên nhóm quyền</label>
            <input class="form-control" id="tenNhom" value="{{ $nhomQuyen->ten_nhom }}"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mô tả</label>
            <input class="form-control" id="moTa" value="{{ $nhomQuyen->mo_ta }}"></input>
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
