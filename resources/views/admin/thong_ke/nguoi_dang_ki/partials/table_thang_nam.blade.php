<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>Email</th>
      <th>Họ và tên</th>
      <th>Số điện thoại</th>
      <th>Facebook</th>
      <th>Ngày sinh</th>
      <th>Ngày tạo</th>
    </tr>
  </thead>
  <tbody >
    @if (empty($congTacVien) || count($congTacVien) === 0)
    <tr>
      <td colspan="7">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach ($congTacVien as $item)
    <tr>
      <td>{{ $index++ }}</td>
      <td class="text-nowrap">{{ $item->email }}</td>
      <td>{{ $item->ho_va_ten }}</td>
      <td>{{ $item->so_dien_thoai }}</td>
      <td><a href="{{ $item->facebook }}">{{ $item->facebook }}</a></td>
      <td class="text-nowrap">{{ date('Y-m-d',strtotime($item->ngay_sinh))}}</td>
      <td class="text-nowrap">{{ substr($item->created_at, 0, 10) }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($congTacVien) !!}
