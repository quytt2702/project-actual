<div class="table-responsive">
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Link landing page</th>
        <th>Ngày tạo</th>
      </tr>
    </thead>
    <tbody>
      @if(empty($khachHang) || count($khachHang) === 0)
      <tr>
        <td colspan="6">Không có dữ liệu</td>
      </tr>
      @else
      @php
      $index = 1;
      @endphp
      @foreach ($khachHang as $item)
      <tr>
        <td class="text-center">{{ $index++ }}</td>
        <td>{{ $item->ho_ten }}</td>
        <td class="text-primary">{{ $item->email }}</td>
        <td>{{ $item->sdt }}</td>
        <td>{{ $item->link_landing_page }}</td>
        <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  {!! view_paginate_buttons($khachHang) !!}
</div>
