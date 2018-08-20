@extends('admin.layouts.master')
@section('master.title', 'Xét duyệt thưởng đại lý')
@section('master.content')
<div class="row m-t-30">
  <div class="panel">
    <div class="panel-heading">Xét duyệt thưởng đại lý</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
      <div class="panel-body">
        @php
          $thang = date("m");
          $nam = date("Y");
          if($thang == 1) {
            $thang = 12; $nam--;
          } else {
            $thang--;
          }
        @endphp
        <button id="btnThuong" class="btn btn-primary">Thưởng đại lý của tháng {{ $thang }} / {{ $nam }}</button>
        <div class="row m-t-20">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tháng</th>
                    <th>Thông tin cá nhân</th>
                    <th>Doanh thu</th>
                    <th>% Thưởng</th>
                    <th>Số tiền thưởng dự kiến</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $index = 1;
                  @endphp
                  @foreach($xemThuongDaiLyTrongThangHienTai as $item)
                  <tr>
                    <td>{{ $index++ }}</td>
                    <td class="text-center">{{ $thang }}/{{ $nam }}</td>
                    <td>
                      <b>{{ $item['ho_va_ten'] }}</b>
                      <br>
                      {{ $item['email'] }}
                      <br>
                      {{ $item['sdt'] }}
                    </td>
                    <td class="text-right">{{ $item['tong_tien']}} VND</td>
                    <td class="text-right">{{ $item['pham_tram_thuong_du_kien']}} %</td>
                    <td class="text-right">{{ $item['so_tien_thuong']}} VND</td>
                    <td>{{ $item['tinh_trang']}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

