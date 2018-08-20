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
    @foreach($chiTietHoaDonNhapSanPham as $item)
    <tr>
      <td>{{ $index++ }}</td>
      <td>{{ $item->san_pham_ten }}</td>
      <td class="text-right">{{ $item->so_luong_san_pham_nhap }}</td>
      <td class="text-right text-nowrap">{{ number_format($item->don_gia_nhap_san_pham) }} VND</td>
      <td>{{ $item->nha_cung_cap_ten }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@if (!empty($logHoaDonNhapHang) && count($logHoaDonNhapHang) > 0)
  <a href=" {{ route('admin.lich_su_hoa_don_nhap_hang.index', compact('id_don_hang')) }} " class="btn btn-danger">Lịch sử</a>
@endif
