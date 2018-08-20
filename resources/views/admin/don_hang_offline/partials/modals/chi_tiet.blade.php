<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-lg">
    <div class="row m-t-30">
      <div class="col-md-12">
        <div class="white-box">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <div class="box-title">CHI TIẾT HOÁ ĐƠN BÁN HÀNG</div>

          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
              <tr>
                <th>#</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền VND</th>
              </tr>
              @if(empty($chiTietHoaDonBanSanPham) || count($chiTietHoaDonBanSanPham) === 0)
              <tr>
                <td colspan="6">Không có dữ liệu</td>
              </tr>
              @else
              @php
              $index = 1;
              @endphp
              @foreach($chiTietHoaDonBanSanPham as $item)
              <tr>
                <td class="text-center">{{ $index++ }}</td>
                <td>
                  {{ $item->san_pham_ma }}
                </td>
                <td>
                  {{ $item->san_pham_ten }}
                </td>
                <td>
                  {{ $item->so_luong }}
                </td>
                <td>
                  {{ number_format($item->don_gia) }} VND
                </td>
                <td>
                  {{ number_format($item->tong_tien_vnd) }} VND
                </td>
              </tr>
              @endforeach
              @endif
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
