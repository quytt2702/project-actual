<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>Khách mua hàng</th>
      <th>Số điện thoại người mua</th>
      <th>Địa chỉ nhận hàng</th>
      <th>Ngày bán</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($hoaDonBanHang) || count($hoaDonBanHang) === 0)
    <tr>
      <td colspan="6">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach ($hoaDonBanHang as $item)
    <tr>
      <td>{{ $index++ }}</td>
      <td class="text-nowrap">{{ $item->email_khach_hang_mua }}</td>
      <td>{{ $item->sdt_khach_mua_hang}}</td>
      <td>{{ $item->dia_chi_nhan_hang}}</td>
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      <td> <button class="btn btn-primary btnDetail" hash="{{ $item->id }}" >Chi tiết</button> </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($hoaDonBanHang) !!}
