<table class="table table-bordered table-striped table-hover">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Hình đại diện</th>
      <th>Họ và tên</th>
      <th>Email</th>
      <th>Địa chỉ</th>
      <th>Số điện thoại</th>
    </tr>
  </thead>
  <tbody>
    @if(empty($congTacVien) || count($congTacVien) === 0)
      <tr>
        <td colspan="6">Không có dữ liệu</td>
      </tr>
    @else
      @php
        $index = 1;
      @endphp
      @foreach($congTacVien as $item)
      <tr>
        <td class="text-center">{{ $index++ }}</td>
        <td class="text-center">
          <div class="zoom" style="width: 100%;">
            <img src="{{ $item->avatar }}" alt="Avatar" style="width: 70px;">
          </div>
        </td>
        <td>{{ $item->ho_va_ten }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->dia_chi_hien_tai }}</td>
        <td>{{ $item->so_dien_thoai }}</td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($congTacVien) !!}
