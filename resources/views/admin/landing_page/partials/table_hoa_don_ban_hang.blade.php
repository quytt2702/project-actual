<div class="table-responsive">
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Email khách mua hàng</th>
        <th>Địa chỉ nhận hàng</th>
        <th>Số điện thoại khách mua hàng</th>
        <th>Loại thành toán</th>
        <th>HÀNH ĐỘNG</th>
      </tr>
    </thead>
    <tbody>
      @if(empty($hoaDonBanHang) || count($hoaDonBanHang) === 0)
      <tr>
        <td colspan="6">Không có dữ liệu</td>
      </tr>
      @else
      @php
      $index = 1;
      @endphp
      @foreach ($hoaDonBanHang as $item)
      <tr>
        <td class="text-center">{{ $index++ }}</td>
        <td>{{ $item->email_khach_hang_mua }}</td>
        <td class="text-primary">{{ $item->dia_chi_nhan_hang }}</td>
        <td>{{ $item->sdt_khach_hang_mua }}</td>
        <td>{{ $item->loai_thanh_toan }}</td>
        <td class="text-center text-nowrap">
          <button type="button" class="btn btn-primary btnDetail" hash="{{ $item->id }}"><i class="ti-eye"></i></button>
          <button type="button" class="btn btn-danger btnIn" txid="{{ $item->hash }}"><i class="ti-printer"></i></button>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  {!! view_paginate_buttons($hoaDonBanHang) !!}
</div>
