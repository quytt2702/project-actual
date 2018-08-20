 <table class="table table-bordered table-hover" data-page-size="10">
  <thead>
    <tr>
      <th>#</th>
      <th>Thông tin khách hàng</th>
      <th>Địa chỉ giao hàng</th>
      <th>Số tiền mua</th>
      <th>Phí ship</th>
      <th>Tình trạng</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @php
    $index = 1;
    @endphp
    @if (empty($hoaDonBanHang) || count($hoaDonBanHang) === 0)
    <tr>
      <td colspan="7">Không có dữ liệu</td>
    </tr>
    @else
    @foreach($hoaDonBanHang as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>
        <b>{{ empty($item->ho_va_ten) ? $item->ho_ten: $item->ho_va_ten  }}</b>
        <br>
        {{ $item->email }}
        <br>
        {{ $item->sdt }}
      </td>
      <td style="max-width: 300px;">{{ $item->dia_chi_nhan_hang }}
      </td>
      @if (empty($item->so_milk_mua))
      <td class="text-right text-nowrap">{{ number_format($item->so_tien_mua) }} VND</td>
      @else
      <td class="text-right text-nowrap">{{ number_format($item->so_milk_mua) }} MILK</td>
      @endif
      <td class="text-right text-nowrap">{{ number_format($item->fee_ship) }} VND</td>
      @php
      $trang_thai = [
        'CHUA THANH TOAN'      => 'Chưa Thanh Toán',
        'DA THANH TOAN'        => 'Đã Thanh Toán',
        'DANG VAN CHUYEN'      => 'Đang vận chuyển',
        'GIAO KHONG DUOC'      => 'Giao không đuợc',
        'THUC HIEN THANH CONG' => 'Thực hiện thành công',
        'ADMIN HUY DON HANG'   => 'Admin huỷ đơn hàng',
      ];
      @endphp
      <td class="text-center">
        @if($item->trang_thai === 'THUC HIEN THANH CONG')
        <span class="label label-success">{{ $trang_thai[$item->trang_thai] }}</span>
        @elseif($item->trang_thai === 'DANG VAN CHUYEN')
        <button class="btn btn-warning btn-block btnTrangThaiDonHang m-b-10" data-code="{{ $item->hoa_don_ban_hang_id }}" data-toggle="modal">{{ $trang_thai[$item->trang_thai] }}</button>
        <a class="text-primary" target="_blank" rel="noopener noreferrer" href="{{ $item->tracking_link }}"> Click để xem vận đơn</a>
        @else
        <button class="btn btn-warning btn-block btnTrangThaiDonHang" data-code="{{ $item->hoa_don_ban_hang_id }}" data-toggle="modal">{{ $trang_thai[$item->trang_thai] }}</button>
        @endif
      </td>
      <td class="text-center text-nowrap">
        <button type="button" class="btn btn-primary btnChiTiet" txid="{{ $item->hoa_don_ban_hang_id}}"><i class="ti-eye"></i></button>
        <button type="button" class="btn btn-danger btnTaiXuong" hash="{{ $item->hash }}"><i class="ti-printer"></i></button>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
