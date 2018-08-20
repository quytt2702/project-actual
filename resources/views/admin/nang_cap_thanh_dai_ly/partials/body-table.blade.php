<table class="table color-table inverse-table">
  <div class="input-group">
    <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
    <span class="input-group-addon">
      <i id="btnSearch"  class="fa fa-search"> </i>
    </span>
  </div>
  <br>
  <thead>
    <tr>
      <th>#</th>
      <th>Tên/Email</th>
      <th>Địa chỉ</th>
      <th>Ngân hàng</th>
      <th>Tình thành</th>
      <th>Hành động</th>
    </tr>
  </thead>
  @if (empty($congTacVien) || count($congTacVien) === 0)
  <tr>
    <td colspan="6">Không có dữ liệu</td>
  </tr>
  @else
  @php
  $index = 1;
  @endphp
  @foreach($congTacVien as $item)
  <tr>
    <td>{{ $index++ }}</td>
    <td>
      <p>{{ $item->ho_va_ten }}</p>
      <p>{{ $item->email }}</p>
    </td><td>
    Số tài khoản: {{ $item->so_tai_khoan }}, tại ngân hàng {{ $item->ten_ngan_hang }}<br>
    <span class="text-primary">Chủ tài khoản: {{ $item->ho_va_ten }}, chi nhánh {{ $item->ten_chi_nhanh }}</span>
  </td>
  <td>{{ $item->dia_chi_hien_tai }}</td>
  <td>{{ $item->tinh_thanh }}</td>
  <td class="text-center">
    <button class="btn btn-danger btn-xs btnNangCap" style="padding: 8px 20px;" hash="{{ $item->email }}">Nâng cấp</button>
  </td>
</tr>
@endforeach
@endif
</table>
{!! view_paginate_buttons($congTacVien) !!}
