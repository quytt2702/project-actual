<div class="panel">
  <div class="panel-heading">Quản lý thưởng đại lý</div>
  <div class="panel-wrapper collapse in" aria-expanded="true">
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <td>#</td>
                <td>Họ và tên</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Tháng năm</td>
                <td>Tổng đơn hàng</td>
                <td>Số tiền dự kiến thưởng</td>
                <td>Tình trạng</td>
              </tr>
            </thead>
            <tbody>
              @if (!empty($timKiemPart1))
              @php
                $index = 1;
                $date = date("m") . "/" . date("Y");
              @endphp
              <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $timKiemPart1->ho_va_ten }}</td>
                <td>{{ $timKiemPart1->email }}</td>
                <td class="text-center">{{ $timKiemPart1->sdt }}</td>
                <td>{{ $date }}</td>
                <td class="text-right">{{ number_format($timKiemPart1->tong_tien) }} VND</td>
                <td class="text-right">{{ number_format($phanTramThuongDaiLy->phan_tram_thuong * $timKiemPart1->tong_tien / 100) }} VND</td>
                <td> Chưa trao thuởng</td>
              </tr>
              @endif
              @if (!empty($timKiemPart2))
                @foreach($timKiemPart2 as $item)
                  <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item->cong_tac_vien_ho_va_ten }}</td>
                    <td>{{ $item->cong_tac_vien_email }}</td>
                    <td>{{ $item->cong_tac_vien_sdt }}</td>
                    <td>{{ $item->thang}} / {{ $item->nam}}</td>
                    <td>{{ $item->doanh_thu}}</td>
                    <td>{{ $item->so_tien_thuong}}</td>
                    <td> Đã trao thuởng</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
