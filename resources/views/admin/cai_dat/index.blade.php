@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-cai-dat')
@section('master.title', 'Quản lý cài đặt')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Cài đặt</h3>
      <p class="text-muted m-b-30 font-13">Cài đặt thông số</p>
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group">
                  <div class="input-group-addon">Email</div>
                  <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $caiDat->email }}">
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Email Password</div>
                  <input type="password" class="form-control" id="email_password" placeholder="Email Password" value="{{ $caiDat->email_password }}">
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Số lần nạp sai liên tục</div>
                  <input type="text" class="form-control" id="so_lan_nap_sai_lien_tuc" placeholder="Số lần nạp sai liên tục" value="{{ $caiDat->so_lan_nap_sai_lien_tuc }}">
                </div>
                <div class="input-group" style="display: none;">
                  <div class="input-group-addon">Đơn hàng đầu</div>
                  <input type="number" class="form-control" id="don_hang_dau" placeholder="Đơn hàng đầu" value="{{ $caiDat->don_hang_dau }}">
                </div>
                <div class="input-group" style="display: none;">
                  <div class="input-group-addon">Đơn hàng sau</div>
                  <input type="number" class="form-control" id="don_hang_sau" placeholder="Đơn hàng sau" value="{{ $caiDat->don_hang_sau }}">
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
                  <div class="input-group-addon">Phí ship CTV</div>
                <input type="number" class="form-control" id="phi_ship_ctv" placeholder="Phí ship CTV" value="{{ $caiDat->phi_ship_ctv }}">
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Phí ship COD</div>
                  <input type="number" class="form-control" id="phi_ship_cod" placeholder="Phí ship COD" value="{{ $caiDat->phi_ship_cod }}">
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Phí ship Ngân lượng</div>
                  <input type="number" class="form-control" id="phi_ship_ngan_luong" placeholder="Phí ship CTV" value="{{ $caiDat->phi_ship_ngan_luong }}">
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
