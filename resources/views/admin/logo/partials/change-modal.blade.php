<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Đổi tên ngân hàng</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Tên ngân hàng</label>
                        <input type="hidden" id="idNganHang" value="{{ $nganHang->id }}">
                        <input class="form-control" id="tenNganHang" value="{{ $nganHang->ten_ngan_hang }}"></input>
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
