<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Đổi mục phần trăm thưởng đại lý</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" value="{{ $phanTramThuongDaiLy->id }}">
        <div class="form-group">
          <label for="message-text" class="control-label">Mục yêu cầu dưới</label>
          <input class="form-control" id="muc_yeu_cau_duoi" value="{{ $phanTramThuongDaiLy->muc_yeu_cau_duoi }}"></input>
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">Mục yêu cầu trên</label>
          <input class="form-control" id="muc_yeu_cau_tren" value="{{ $phanTramThuongDaiLy->muc_yeu_cau_tren }}"></input>
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">Phần trăm thưởng</label>
          <input class="form-control" id="phan_tram_thuong" value="{{ $phanTramThuongDaiLy->phan_tram_thuong }}"></input>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnLuu" data-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>
