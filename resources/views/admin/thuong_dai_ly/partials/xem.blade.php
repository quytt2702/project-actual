<div class="panel">
  <div class="panel-heading">Xem lịch sử trao thưởng của đại lý tháng {{ $thang }} / {{ $nam }}</div>
  <div class="panel-wrapper collapse in" aria-expanded="true">
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Doanh thu</th>
                <th>Số tiền thưởng</th>
                <th>Ngày thưởng</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              @php
                $index = 1;
              @endphp
              @foreach($xemThangNamThuongDaiLy as $item)
              <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $item->cong_tac_vien_ho_va_ten }}</td>
                <td>{{ $item->cong_tac_vien_email }}</td>
                <td class="text-center">{{ $item->cong_tac_vien_sdt }}</td>
                <td class="text-center">{{ $item->thang}} / {{ $item->nam}}</td>
                <td class="text-right">{{ $item->doanh_thu}} VND</td>
                <td class="text-right">{{ number_format($phanTramThuongDaiLy->phan_tram_thuong * $item->doanh_thu / 100) }} VND</td>
                <td> Đã trao thuởng</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
