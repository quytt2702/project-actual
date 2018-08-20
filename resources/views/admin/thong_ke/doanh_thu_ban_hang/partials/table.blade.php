<div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <td style="border-left:1px solid #e4e7ea;"><b>Tổng tiền đã nhận:</b></td>
        <td class="text-right text-primary"><b>{{ number_format($tongTienDaNhan) }} VND</b></td>
        <td style="border-right:1px solid #e4e7ea;"><i>{{ number_to_words($tongTienDaNhan) }}</i></td>
      </tr>
      <tr>
        <td style="border-left:1px solid #e4e7ea;"><b>Tổng tiền đang giao:</b></td>
        <td class="text-right text-primary"><b>{{ number_format($tongTienDangGiao) }} VND</b></td>
        <td style="border-right:1px solid #e4e7ea;"><i>{{ number_to_words($tongTienDangGiao) }}</i></td>
      </tr>
      <tr style="border-bottom:1px solid #e4e7ea;">
        <td style="border-left:1px solid #e4e7ea;"><b>Tổng tiền trong tháng:</b></td>
        <td class="text-right text-primary"><b>{{ number_format($tongTien) }} VND</b></td>
        <td style="border-right:1px solid #e4e7ea;"><i>{{ number_to_words($tongTien) }}</i></td>
      </tr>
    </table>
  </div>
</div>
<div class="col-md-12 m-t-20">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên Khách Hàng Mua</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Số Tiền mua</th>
            <th>Loại đơn hàng</th>
            <th>Trạng Thái</th>
            <th>Hoạt động</th>
          </tr>
        </thead>
        <tbody >
          @if (empty($doanhThuBanHang) || count($doanhThuBanHang) === 0)
          <tr>
            <td colspan="8">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          $loaiThanhToan = [
            'Offline'              => 'Hóa đơn Offline',
            'COD TMDT'             => 'Mua tại trang TMĐT',
            'COD LandingPage'      => 'Mua tại LandingPage',
            'CTV MILK'             => 'Thanh toán bằng MILK',
            'CTV VND'              => 'Thanh toán bằng VND',
          ];
          $trangThai = [
            'CHUA THANH TOAN'      => 'Chưa thanh toán',
            'DA THANH TOAN'        => 'Đã thanh toán',
            'DANG VAN CHUYEN'      => 'Đang vận chuyển',
            'GIAO KHONG DUOC'      => 'Giao không đưọc',
            'THUC HIEN THANH CONG' => 'Thực hiện thành công',
          ];
          $styleTrangThai = [
            'DA THANH TOAN'        => 'label-success',
            'DANG VAN CHUYEN'      => 'label-warning',
            'THUC HIEN THANH CONG' => 'label-info',
          ];
          @endphp
          @foreach ($doanhThuBanHang as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td>{{ $item->ho_ten }}</td>
            <td class="text-nowrap">{{ $item->email_khach_hang_mua }}</td>
            <td class="text-center">{{ $item->sdt_khach_hang_mua }}</td>
            <td class="text-right text-nowrap">{{ number_format($item->so_tien_mua) }} VND</td>
            <td class="text-left">{{ $loaiThanhToan[$item->loai_thanh_toan] }}</td>
            <td class="text-center"><label class="label {{ $styleTrangThai[$item->trang_thai] }}">{{ $trangThai[$item->trang_thai] }}</label></td>
            <td class="text-center"> <a href="{{ route('admin.thong_ke.doanh_thu_ban_hang.chi_tiet', $item->id) }}" class="btn btn-primary btnDetail" >Chi tiết</a> </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($doanhThuBanHang) !!}
    </div>
  </div>
</div>
