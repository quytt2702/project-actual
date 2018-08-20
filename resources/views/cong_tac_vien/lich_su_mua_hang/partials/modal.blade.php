<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chi tiết hóa đơn</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <td>#</td>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Số lương</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>
              </tr>
            </thead>
            <tbody>
              @php
                $index = 1;
              @endphp
              @foreach ($chiTietHoadonBanHang as $item)
                <tr>
                  <td class="text-center">{{ $index++ }}</td>
                  <td>{{ $item->san_pham_ma }}</td>
                  <td>{{ $item->san_pham_ten }}</td>
                  <td class="text-right">{{ number_format($item->so_luong) }}</td>
                  <td class="text-right">{{ number_format($item->don_gia) }} VND</td>
                  <td class="text-right">{{ number_format($item->don_gia * $item->so_luong) }} VND</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

