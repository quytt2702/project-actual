@extends('admin.layouts.master')
@section('master.bodyclass', 'ctv-toi-gioi-thieu')
@section('master.title', 'Quản lý cộng tác viên')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">
        QUẢN LÝ CỘNG TÁC VIÊN
        <a href="{{ route('admin.cong_tac_vien.download') }}"><i class="fa fa-download pull-right"></i></a>
      </div>
      <div class="form-horizontal">
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
          <span class="input-group-addon">
            <i id="btnSearch"  class="fa fa-search"> </i>
          </span>
        </div>
        <br>
        <div id="cong_tac_vien_body" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
