@extends('admin.layouts.master')
@section('master.title', 'Quản lý người dùng')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">
        QUẢN LÝ NGƯỜI DÙNG
        <a href="{{ route('admin.nguoi_dung.download') }}"><i class="fa fa-download pull-right"></i></a>
      </div>
      <div class="form-horizontal">
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
          <span class="input-group-addon">
            <i id="btnSearch"  class="fa fa-search"> </i>
          </span>
        </div>
        <div id="nguoi_dung_body" class="table-responsive">
        </div>
      </div>
      <a href="{{ route('admin.nguoi_dung.add') }}" type="button" class="btn btn-primary">Thêm người dùng</a>
    </div>
  </div>
</div>

@endsection
