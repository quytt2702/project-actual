@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-xac-thuc-show')
@section('master.title', 'Quản lý cài đặt ngôn ngữ')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Chi tiết xác thực</h3>
      <p class="text-muted m-b-30 font-13">Xác thực thông tin cho người dùng hệ thống</p>
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <div class="input-group-addon">Họ và tên</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->ho_va_ten }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Email</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->email }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">CMND</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->cmnd }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Số tài khoản</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->so_tai_khoan }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Giới tính</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->gioi_tinh }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Số điện thoại</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->so_dien_thoai }}" disabled>
                </div>
                <div class="input-group">
                  <img src="{{ $congTacVien->img_01 }}" alt="" style="width: 100%; height: 500px; object-fit: contain;">
                </div>
                <div class="input-group">
                  <img src="{{ $congTacVien->avatar }}" alt="" style="width: 100%; height: 500px; object-fit: contain;">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <div class="input-group-addon">Facebook</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->facebook }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Tên chi nhánh</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->ten_chi_nhanh }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Địa chỉ giao hàng</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->dia_chi_hien_tai }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Địa chỉ CMND</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ $congTacVien->dia_chi_cmnd }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Ngày sinh</div>
                  <input style="background-color: #dfe6e9;" type="text" class="form-control" value="{{ substr($congTacVien->ngay_sinh, 0, 10) }}" disabled>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Lí do không duyệt (nếu có)</div>
                  <input type="text" class="form-control" id="li_do_khong_duyet">
                </div>
                <div class="input-group">
                  <img src="{{ $congTacVien->img_02 }}" alt="" style="width: 100%; height: 500px; object-fit: contain;">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <button id="btnCancel" class="btn btn-default pull-right">Huỷ</button>
        </div>
        <div class="col-sm-6">
          <button id="btnKhongDuyet" class="btn btn-danger pull-left m-r-10">Không duyệt</button>
          <button id="btnDuyet" class="btn btn-primary pull-left">Duyệt</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
