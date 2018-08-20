@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Danh sách giới thiệu')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Danh sách giới thiệu</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <br>
          <div id="danh_sach_gioi_thieu_body" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
