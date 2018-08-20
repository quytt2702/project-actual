@extends('cong_tac_vien.layouts.master')
@section('master.bodyclass', 'ctv-lich-su-giao-dich')
@section('master.title', 'Lịch sử giao dịch')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Lịch sử giao dịch</h3>
      <p class="text-muted m-b-30 font-13"></p>
      <div class="row">
{{--         <div class="col-xs-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs m-b-15" role="tablist">
            <li role="presentation" class="active"><a class="option" value="1" href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Thưởng giới thiệu thành viên</span></a></li>
            <li role="presentation"><a class="option" value="2" href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Thưởng mua hàng</span></a></li>
            <li role="presentation"><a class="option" value="3" href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Nạp API</span></a></li>
            <li role="presentation"><a class="option" value="4" href="#tab04" aria-controls="tab04" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Nạp Milk</span></a></li>
            <li role="presentation"><a class="option" value="4" href="#tab05" aria-controls="tab05" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Thưởng đại lý</span></a></li>
          </ul>
          <!-- Tab panes -->
        </div> --}}
{{--         <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="tab01">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Email</td>
                      <td>Họ và tên</td>
                      <td>Số điện thoại</td>
                      <td>Số tiền</td>
                      <td>Trạng thái</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $index = 1;
                    @endphp
                    @foreach($thuongGioiThieuThanhVien as $item)
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $item->email}}</td>
                      <td>{{ $item->ho_va_ten }}</td>
                      <td>{{ $item->sdt }}</td>
                      <td>{{ $item->so_tien }}</td>
                      <td>Đã thưởng</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab02">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Email</td>
                      <td>Họ và tên</td>
                      <td>Số điện thoại</td>
                      <td>Số tiền được tdưỏng</td>
                      <td>Ngày thưởng</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $index = 1;
                    @endphp
                    @foreach($thuongMuaHang as $item)
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $item->email_khach_hang_mua }}</td>
                      <td>{{ $item->ten_khach_hang_mua }}</td>
                      <td>{{ $item->sdt_khach_hang_mua }}</td>
                      <td>{{ $item->so_tien_duoc_thuong }}</td>
                      <td>{{ substr($item->created_at, 0, 10) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab03">
            <div class="col-md-6">
              <h3>Tab03</h3>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab04">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Số điểm</td>
                      <td>Mã nạp</td>
                      <td>Seri</td>
                      <td>Trạng thái</td>
                      <td>Thời gian</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $index = 1;
                    @endphp
                    @foreach($lichSuNapDiem as $item)
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $item->so_diem }}</td>
                      <td>{{ $item->ma_nap }}</td>
                      <td>{{ $item->seri }}</td>
                      @if ($item->trang_thai === 'YES')
                      <td>
                        <label class="label label-success">Đã nạp thành công</label>
                      </td>
                      @else
                      <td>
                        <label class="label label-danger">Nạp điểm thất bại</label>
                      </td>
                      @endif
                      <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab05">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Tháng năm</td>
                      <td>Tổng đơn hàng</td>
                      <td>Số tiền dự kiến thưởng</td>
                      <td>Tình trạng</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $index = 1;
                    $date = date("m") . "/" . date("Y");
                    $thuongDaiLy01TongTien = empty($thuongDaiLy01->tong_tien) ? 0 : $thuongDaiLy01->tong_tien;
                    $phanTramThuongDaiLyPhanTramThuong = empty($phanTramThuongDaiLy->phan_tram_thuong) ? 0 : $phanTramThuongDaiLy->phan_tram_thuong;
                    @endphp
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $date }}</td>
                      <td>{{ number_format($thuongDaiLy01TongTien) }} VND</td>
                      <td>{{ number_format($phanTramThuongDaiLyPhanTramThuong * $thuongDaiLy01TongTien / 100) }} VND</td>
                      <td> Chưa trao thuởng</td>
                    </tr>
                    @foreach($thuongDaiLy02 as $item)
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $thuongDaiLy02->thang}} / {{ $thuongDaiLy02->nam}}</td>
                      <td>{{ $thuongDaiLy02->doanh_thu}}</td>
                      <td>{{ $thuongDaiLy02->so_tien_thuong}}</td>
                      <td> Đã trao thuởng</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        --}}
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Email</th>
                <th>Số tiền (Milk)</th>
                <th>Lý do</th>
                <th>Ngày thưởng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lichSuGiaoDich as $item)
              <tr class="{{ ($item['col_03'] === 'Nạp Milk thất bại') ? 'text-danger':'' }}">
                <td style="text-align: left;">{{ $item['index'] }}</td>
                <td style="text-align: left;">{{ $item['col_01'] }}</td>
                <td style="text-align: right;">{{ $item['col_02'] }}</td>
                <td style="text-align: left;">{{ $item['col_03'] }}</td>
                <td>{{ $item['col_04'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
