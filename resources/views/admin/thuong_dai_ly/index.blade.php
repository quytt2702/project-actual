@extends('admin.layouts.master')
@section('master.title', 'Thưởng đại lý')
@section('master.content')
<div class="row m-t-30">
  <div class="panel">
    <div class="panel-heading">Quản lý thưởng đại lý</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
      <div class="panel-body p-t-0">
        <div class="row">
          <div class="col-md-6" style="border-right: 1px solid #7f8c8d;">
            <div class="col-md-5">
              <select id="thang" class="form-control">
                @for($i = 1; $i<=12; $i++)
                  <option value="{{ $i }}">Tháng {{ $i }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-5">
              <select id="nam" class="form-control">
                @for($i = 2018; $i <= 2030; $i++)
                  <option value="{{ $i }}">Năm {{ $i }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-2">
              <button id="btnXem" class="btn btn-primary">Xem</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-8">
              <input id="content" class="form-control" placeholder="Bạn hãy nhập vào thông tin đại lý">
            </div>
            <div class="col-md-4">
              <button id="btnTimKiem" class="btn btn-success">Tìm kiếm</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @php
  $thang = date('m');
  $nam   = date('Y');
  @endphp
  <div id="quan_ly_thuong_dai_ly_table">
    <div class="panel">
      <div class="panel-heading">Doanh thu và thưởng dự kiến của đại lý trong tháng {{ $thang }} / {{ $nam }}.</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tháng</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Doanh thu</th>
                    <th>% Thưởng</th>
                    <th>Số tiền thưởng dự kiến</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  @if (empty($xemThuongDaiLyTrongThangHienTai) || count($xemThuongDaiLyTrongThangHienTai) === 0)
                  <tr>
                    <td colspan="9">Không có dữ liệu</td>
                  </tr>
                  @else
                  @php
                    $index = 1;
                    $date = date("m") . "/" . date("Y");
                  @endphp
                  @foreach($xemThuongDaiLyTrongThangHienTai as $item)
                    <tr>
                      <td>{{ $index++ }}</td>
                      <td>{{ $date }}</td>
                      <td>{{ $item['ho_va_ten'] }}</td>
                      <td>{{ $item['email'] }}</td>
                      <td class="text-center">{{ $item['sdt'] }}</td>
                      <td class="text-right">{{ $item['tong_tien']}}</td>
                      <td class="text-right">{{ $item['pham_tram_thuong_du_kien']}} %</td>
                      <td class="text-right">{{ $item['so_tien_thuong']}}</td>
                      <td> Chưa trao thuởng</td>
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
  </div>
</div>
@endsection

