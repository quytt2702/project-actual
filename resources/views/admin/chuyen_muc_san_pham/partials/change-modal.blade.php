<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chỉnh sửa chuyên mục</h4>
      </div>
      <div class="modal-body">
        <div>
          <input type="hidden" id="id_chuyen_muc_san_pham" value="{{ $chuyenMucSanPham->id }}">
          <div class="form-group">
            <label for="message-text" class="control-label">Tên chuyên mục sản phẩm</label>
            <input class="form-control" id="chuyen_muc_san_pham_ten_edit" value="{{ $chuyenMucSanPham->chuyen_muc_san_pham_ten }}"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">URL</label>
            <input class="form-control" id="chuyen_muc_san_pham_url_edit" value="{{ $chuyenMucSanPham->chuyen_muc_san_pham_url }}"></input>
          </div>
          <div class="form-group">
            <label>Chọn ngôn ngữ</label>
            <select id="chuyen_muc_san_pham_id_ngon_ngu_edit" class="form-control m-t-5">
              @foreach ($ngonNgu as $item)
              <option value="{{ $item->id }}" {{ ($item->id === $chuyenMucSanPham->chuyen_muc_san_pham_id_ngon_ngu) ? 'selected':'' }}>{{ $item->ten }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Trạng thái</label>
            <button class="btn btn-primary m-l-10" id="chuyen_muc_san_pham_is_active_edit">Active</button>
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
