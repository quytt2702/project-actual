@extends('admin.layouts.master')
@section('master.title', 'Email marketing')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title">Email marketing</h3>
      <div class="row">
        <div class="col-md-8">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" style="table-layout:fixed;">
              <thead>
                <tr>
                  <th style="width: 50px;" class="text-center">#</th>
                  <th>Nội dung</th>
                  <th style="width: 120px;">Hành động</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 50px;" class="text-center">1</td>
                  <td>Cộng tác viên (Đã xác thực)</td>
                  <td class="text-center" style="width: 120px">
                    <button id="btnCTVDaXacThuc" class="btn btn-primary">Tải xuống</button>
                  </td>
                </tr>
                <tr>
                  <td style="width: 50px;" class="text-center">2</td>
                  <td>Cộng tác viên (Toàn bộ)</td>
                  <td class="text-center" style="width: 120px">
                    <button id="btnCtvTatCa" class="btn btn-warning">Tải xuống</button>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">3</td>
                  <td>Đại lý</td>
                  <td class="text-center" style="max-width: 100px">
                    <button id="btnDaiLy" class="btn btn-success">Tải xuống</button>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">4</td>
                  <td>Khách hàng</td>
                  <td class="text-center" style="max-width: 100px">
                    <button id="btnKhachHang" class="btn btn-danger">Tải xuống</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
