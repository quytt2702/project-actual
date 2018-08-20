<div class="col-sm-12">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Email</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Tiền thưởng giới thiêu</th>
            <th>Tiền thưởng đơn hàng</th>
            <th>Tiền thưởng đại lý</th>
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
            <td class="text-center">{{ $index++ }}</td>
            <td class="text-nowrap">{{ $item->email }}</td>
            <td>{{ $item->ho_va_ten }}</td>
            <td class="text-center">{{ $item->so_dien_thoai }}</td>
            <td class="text-right">{{ number_format($item->TienThuongGioiThieu) }} VND</td>
            <td class="text-right">{{ number_format($item->TienThuongDonHang) }} VND</td>
            <td class="text-right">{{ number_format($item->TienThuongDaiLy) }} VND</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($congTacVien) !!}
    </div>
  </div>
</div>
