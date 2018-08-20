<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" >
  <thead>
    <tr>
      <th>#</th>
      <th>Ngày mua</th>
      <th>Tiền mua hàng</th>
      <th>Phí ship</th>
      <th>Tổng tiền</th>
      <th>Tình trạng</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($lichSuMuaHang) || count($lichSuMuaHang) === 0)
    <tr>
      <td colspan="7">Không có dữ liệu</td>
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

    $style_trang_thai = [
      'CHUA THANH TOAN'      => 'label-default',
      'DA THANH TOAN'        => 'label-primary',
      'DANG VAN CHUYEN'      => 'label-warning',
      'GIAO KHONG DUOC'      => 'label-info',
      'THUC HIEN THANH CONG' => 'label-success',
    ];
    @endphp
    @foreach($lichSuMuaHang as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      <td class="text-right">{{ number_format($item->so_tien_mua) }} VND</td>
      <td class="text-right">{{ number_format($item->fee_ship) }} VND</td>
      <td class="text-right">{{ number_format($item->so_tien_mua + $item->fee_ship) }} VND</td>
      <td class="text-center">
        <label class="label {{ $style_trang_thai[$item->trang_thai] }}">{{ $trang_thai[$item->trang_thai] }}</label>
      </td>
      <td class="text-center"><button class="btn btn-xs btn-warning btnViewDetail" hash="{{ $item->id }}">Chi tiết</button></td>
    </tr>
    @endforeach
    @endif
  </tbody>
  </table>
  {!! view_paginate_buttons($lichSuMuaHang) !!}
</div>
