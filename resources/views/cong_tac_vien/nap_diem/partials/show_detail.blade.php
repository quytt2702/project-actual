<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Chi tiết</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản Phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                @if (empty($chiTietHoaDon) || count($chiTietHoaDon) === 0)
                <tr>
                  <td colspan="7">Không có dữ liệu</td>
                </tr>
                @else
                @php
                $index = 1;
                @endphp
                @foreach ($chiTietHoaDon as $item)
                <tr>
                  <td class="text-center">{{ $index++ }}</td>
                  <td class="text-nowrap">{{ $item->san_pham_ma }}</td>
                  <td>{{ $item->san_pham_ten}}</td>
                  <td class="text-center">
                    <div style="overflow: hidden; max-width: 170px; max-height: 150px;">
                      <img style="object-fit: cover; width: 100%; height: 100%;" src="{{ $item->san_pham_hinh_dai_dien}}" alt="logo">
                    </div>
                  </td>
                  <td class="text-right">{{ number_format($item->tong_tien_milk/$item->so_luong) }} MILK</td>
                  <td class="text-right">{{ $item->so_luong }}</td>
                  <td class="text-right">{{ number_format($item->tong_tien_milk) }} MILK</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
