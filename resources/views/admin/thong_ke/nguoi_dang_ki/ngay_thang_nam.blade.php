@extends('admin.layouts.master')
@section('master.title', 'Thống kê người đăng ký theo ngày tháng năm')
@section('master.content')
<div class="row m-t-30">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="box-title">THỐNG KÊ NGƯỜI ĐĂNG KÍ THEO NGÀY THÁNG NĂM</div>
      <div class="row">
        <div class="col-sm-5">
          <div class="form-group">
            <div class="input-group date" >
              <input type="text" class="form-control complex-colorpicker" id="picker_start" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <div class="input-group date">
              <input type='text' class="form-control" id="picker_end"/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <button class="btn btn-info" id="btnThongKe">Thống kê</button>
        </div>
      </div>
      <div class="row">
        <div id="thong_ke_nguoi_dk_ngay_thang_nam">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
