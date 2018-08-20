<table class="table table-bordered table-hover table-striped" id="tab_logic">
  <thead>
    <tr>
      <th>#</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Đơn giá nhập</th>
      <th>Nhà cung cấp</th>
    </tr>
  </thead>
  <tbody>
    @php
      $index = 1;
    @endphp
    @foreach($logHoaDonNhapHang as $item)
    <tr>
      <td>{{ $index++ }}</td>
      <td>{{ $item->san_pham_ten }}</td>
      <td class="text-right">{{ number_format($item->so_luong_san_pham_nhap) }}</td>
      <td class="text-right">{{ number_format($item->don_gia_nhap_san_pham) }}</td>
      <td>{{ $item->nha_cung_cap_ten }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
