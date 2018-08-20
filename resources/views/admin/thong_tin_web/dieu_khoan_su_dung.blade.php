@extends('admin.layouts.master')
@section('master.title', 'Điều khoản sử dụng')
@section('master.content')
<script src="/cktemplate/ckeditor/ckeditor.js"></script>
<div class="row m-t-30">
  <div class="col-md-9">
    <div class="white-box">
      <h3 class="box-title m-b-0">Điều khoản sử dụng</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label class="col-md-12">Nội dung</label>
            <div class="col-md-12">
              <textarea id="noi_dung" class="form-control" rows="15" placeholder="Nhập nội dung">{{ $noiDung->url_noi_dung }}</textarea>
            </div>
          </div>
          <div class="col-md-12 m-t-20">
            <button id="btnUpdate" class="btn btn-info waves-effect waves-light m-r-10">Cập nhật</button>
            <button id="btnBack" class="btn btn-inverse waves-effect waves-light">Trở về</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

