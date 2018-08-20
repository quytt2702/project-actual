@extends('admin.layouts.master')
@section('master.title', 'Quản lý rút tiền')
@section('master.content')
<div id="modal"></div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Quản lý rút tiền</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs m-b-15" role="tablist">
            <li role="presentation" class="li active" value="1"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="hidden-xs">Đang xử lý</span></a></li>
            <li role="presentation" class="li" value="2"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="hidden-xs">Chuyển khoản thành công</span></a></li>
            <li role="presentation" class="li" value="3"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="hidden-xs">Huỷ bỏ</span></a></li>
          </ul>
          <!-- Tab panes -->
        </div>
        <div class="col-md-12">
          <div id="quan_ly_rut_tien_body">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
