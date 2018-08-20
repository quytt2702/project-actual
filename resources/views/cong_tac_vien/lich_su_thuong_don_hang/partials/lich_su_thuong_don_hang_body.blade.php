<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Hash</th>
      <th>Email</th>
      <th>Tổng tiền mua hàng</th>
      <th>Phần trăm được thưởng</th>
      <th>Số tiền được thưởng</th>
      <th>Cấp thưởng</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($logThuongDonHang) || count($logThuongDonHang) === 0)
      <tr>
        <td colspan="7">Không có dữ liệu</td>
      </tr>
    @else
    @php
      $index = 1;
    @endphp
      @foreach($logThuongDonHang as $item)
        <tr>
          <td class="text-center">{{ $index++ }}</td>
          <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->hash }}</td>
          <td>{{ $item->email_khach_hang_mua }}</td>
          <td class="text-right">{{ number_format($item->so_tien_mua_don_hang) }} VND</td>
          <td class="text-center">{{ $item->phan_tram_duoc_thuong * 100 }}%</td>
          <td class="text-right">{{ number_format($item->so_tien_duoc_thuong) }} VND</td>
          <td>
            @if ($item->so_tien_duoc_thuong == 0)
              Chiết khấu trực tiếp
            @elseif ($item->cap_thuong == 1)
              Thuởng trực tiếp
            @elseif ($item->cap_thuong == 2)
              Thuởng gián tiếp
            @endif
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($logThuongDonHang) !!}
