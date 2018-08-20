 <table class="table table-bordered table-hover" data-page-size="10">
  <thead>
    <tr>
      <th>#</th>
      <th>Thông tin khách hàng</th>
      <th>Địa chỉ giao hàng</th>
      <th>Số tiền mua</th>
      <th>Email người huỷ</th>
      <th>Lý do</th>
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
      <td class="">{{ $item->email_cap_nhat }}</td>
      <td>{{ $item->ghi_chu }}</td>
      <td class="text-center text-nowrap">
        <button type="button" class="btn btn-primary btnChiTiet" txid="{{ $item->hoa_don_ban_hang_id}}"><i class="ti-eye"></i></button>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
