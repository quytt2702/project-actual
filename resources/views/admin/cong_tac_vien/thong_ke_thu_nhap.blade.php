@extends('admin.layouts.master')
@section('master.bodyclass', 'hoa-don-thang-nam')
@section('master.title', 'Thống kê thu nhập cộng tác viên')
@section('master.content')
<div id="modal-hd-ngay-thang-nam"></div>
<div class="row m-t-30">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="box-title">THỐNG KÊ THU NHẬP CỘNG TÁC VIÊN</div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <div class="input-group date" >
              <input type="text" class="form-control complex-colorpicker" id="picker_start" />
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
        <div id="thong_ke_thu_nhap">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
