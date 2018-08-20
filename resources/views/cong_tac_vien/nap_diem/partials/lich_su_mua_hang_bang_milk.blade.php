<div id="pagi-lich-su-mua">
<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Ngày mua</th>
      <th>Số tiền mua</th>
      <th>Tình trạng</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($hoaDonBanHang) || count($hoaDonBanHang) === 0)
    <tr>
      <td colspan="5">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    $trang_thai = [
      'CHUA THANH TOAN'      => 'Chưa thanh toán',
      'DA THANH TOAN'        => 'Đã thanh toán',
      'DANG VAN CHUYEN'      => 'Đang vận chuyển',
      'GIAO KHONG DUOC'      => 'Giao không được',
      'THUC HIEN THANH CONG' => 'Thực hiện thành công',
    ];
    @endphp
    @foreach($hoaDonBanHang as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td class="text-right">{{ substr($item->created_at, 0, 10) }}</td>
      <td class="text-right">{{ $item->so_milk_mua }} MILK</td>
      <td>{{ $trang_thai[$item->trang_thai] }}</td>
      <td class="text-center"> <button class="btn btn-primary btnDetail" hash="{{ $item->id }}" >Chi tiết</button> </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($hoaDonBanHang) !!}
</div>
