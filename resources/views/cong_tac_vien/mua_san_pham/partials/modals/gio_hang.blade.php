<div id="gio_hang_modal" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Giỏ hàng</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" id="id_san_pham" value="{{ $sanPham->id }}">
          <div class="col-md-4">
            <img src="{{ $sanPham->san_pham_hinh_dai_dien }}" alt="" style="width: 100%;">
          </div>
          <div class="col-md-8">
            <h4><b>{{ $sanPham->san_pham_ten }}</b></h4>
            <p>{!! $sanPham->san_pham_mo_ta !!}</p>
            <p><b>Số lượng</b></p>
            <input type="number" id="so_luong" value="1">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal" id="btnMuaSam">Tiếp tục mua sắm</button>
        <button type="button" class="btn btn-success waves-effect text-left" data-dismiss="modal" id="btnGioHang">Chuyển qua Giỏ Hàng <i class="fa fa-arrow-right"></i></button>
      </div>
    </div>
  </div>
</div>


