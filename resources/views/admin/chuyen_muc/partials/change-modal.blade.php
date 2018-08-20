<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chỉnh sửa chuyên mục</h4>
      </div>
      <div class="modal-body">
        <div>
          <input type="hidden" id="id-chuyen-muc" value="{{ $id }}">
          <div class="form-group">
            <label for="message-text" class="control-label">Tên chuyên mục</label>
            <input class="form-control" id="ten_chuyen_muc_edit" value="{{ $chuyenMuc->ten_chuyen_muc }}"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">URL</label>
            <input class="form-control" id="url_edit" value="{{ $chuyenMuc->url }}"></input>
          </div>
          <div class="form-group">
            <label>Chọn ngôn ngữ</label>
            <select id="id_ngon_ngu_edit" class="form-control m-t-5">
              @foreach ($ngonNgu as $item)
              <option value="{{ $item->id }}" {{ ($item->id === $chuyenMuc->id_ngon_ngu) ? 'selected':'' }}>{{ $item->ten }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <div class="checkbox checkbox-success">
              <input id="is_active_edit" type="checkbox" {{ ($chuyenMuc->is_active === 'YES') ? 'checked':'' }}>
              <label for="is_active_edit" style="margin-right: 10px">Trạng thái</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnLuu" data-dismiss="modal">Lưu</button>
      </div>
    </div>
  </div>
</div>
<script>
  $('.js-switch').each(function () {
    new Switchery($(this)[0], $(this).data());
  });
</script>
