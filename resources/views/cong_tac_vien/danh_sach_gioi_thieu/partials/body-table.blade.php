<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Họ tên</th>
      <th>Số điện thoại</th>
      <th>Ngày đăng ký</th>
      <th>Tình trạng</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($congTacVien) || count($congTacVien) === 0)
    <tr>
      <td colspan="4">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;

    $tinh_trang = [
      'NOT YET'   => 'Chưa gửi thông tin xác thực',
      'PENDING'   => 'Hệ thống đang duyệt hồ sơ',
      'NOT ALLOW' => 'Hệ thống không đồng ý duyệt',
      'DONE'      => 'Đã duyệt và thưởng',
    ];

    $style_tinh_trang = [
      'NOT YET'   => 'label-default',
      'PENDING'   => 'label-warning',
      'NOT ALLOW' => 'label-danger',
      'DONE'      => 'label-primary',
    ];
    @endphp
    @foreach($congTacVien as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->ho_va_ten }}</td>
      <td>{{ $item->so_dien_thoai }}</td>
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      <td class="text-center">
        <label class="label {{ $style_tinh_trang[$item->is_kich_hoat] }}">{{ $tinh_trang[$item->is_kich_hoat] }}</label>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($congTacVien) !!}
