@extends('admin.layouts.master')
@section('master.title', 'Quản lý xác thực')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">
        QUẢN LÝ XÁC THỰC
        <a href="{{ route('admin.xac_thuc.download') }}"><i class="fa fa-download pull-right"></i></a>
      </div>
      <div class="form-horizontal">
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
          <span class="input-group-addon">
            <i id="btnSearch"  class="fa fa-search"> </i>
          </span>
        </div>
        <div id="xac_thuc_body" class="table-responsive">
{{--           <div class="pull-right">
            <a href="{{ route('admin.nguoi_dung.add') }}" type="button" class="btn btn-primary">Thêm người dùng</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
