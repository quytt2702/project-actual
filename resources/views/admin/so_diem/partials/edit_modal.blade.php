<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chỉnh sửa nạp thẻ</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Số điểm</label>
            <input type="text" class="form-control m-t-5" value="{{ $soDiem->so_diem }}" id="so-diem" placeholder="Số điểm">
          </div>
          <div class="form-group">
            <label>Nội dung</label>
            <input type="text" class="form-control m-t-5" value="{{ $soDiem->noi_dung }}" id="noi-dung" placeholder="Nội dung">
          </div>
          <div class="checkbox checkbox-primary">
            <input id="kich_hoat" type="checkbox" class="checkboxes" {{ ($soDiem->kich_hoat === 'YES') ? 'checked' : '' }}>
            <label for="kich_hoat">Kích hoạt</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" hash="{{ $soDiem->id }}" id="btnLuu" data-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>
