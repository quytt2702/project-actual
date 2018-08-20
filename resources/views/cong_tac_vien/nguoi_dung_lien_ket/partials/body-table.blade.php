<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Họ tên</th>
      <th>Số điện thoại</th>
      <th>Địa chỉ</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($nguoiDungLienKet) || count($nguoiDungLienKet) === 0)
    <tr>
      <td colspan="5">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach($nguoiDungLienKet as $item)
    <tr>
      <td>{{ $index++ }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->ho_va_ten }}</td>
      <td>{{ $item->so_dien_thoai }}</td>
      <td>{{ $item->dia_chi_hien_tai }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($nguoiDungLienKet) !!}
