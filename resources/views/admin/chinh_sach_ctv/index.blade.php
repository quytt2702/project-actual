@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-chinh-sach-ctv')
@section('master.title', 'Chính sách CTV')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Chính sách cộng tác viên
      </h3>
      <p class="text-muted m-b-30 font-13">Cài đặt thông số</p>
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <div class="input-group-addon">Thưởng giới thiệu đăng ký</div>
                  <input type="number" class="form-control" id="thuong_gioi_thieu_dang_ky" placeholder="Thưởng giới thiệu đăng ký" value="{{ $caiDat->thuong_gioi_thieu_dang_ky }}">
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
                  <div class="input-group-addon">Phần trăm thưởng doanh thu cấp 1</div>
                  <input type="number" class="form-control" id="phan_tram_thuong_doanh_thu_cap_1" placeholder="Phần trăm thưởng doanh thu cấp 1" value="{{ $caiDat->phan_tram_thuong_doanh_thu_cap_1 }}">
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Phần trăm thưởng doanh thu cấp 2</div>
                  <input type="number" class="form-control" id="phan_tram_thuong_doanh_thu_cap_2" placeholder="Phần trăm thưởng doanh thu cấp 2" value="{{ $caiDat->phan_tram_thuong_doanh_thu_cap_2 }}">
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
          <button id="btnChange" class="btn btn-primary pull-left">Lưu</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
