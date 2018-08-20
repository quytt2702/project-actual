@extends('admin.layouts.master')
@section('master.title', 'Quản lý trang')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">
        QUẢN LÝ TRANG
      </div>
      <div class="form-horizontal">
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
          <span class="input-group-addon">
            <i id="btnSearch"  class="fa fa-search"> </i>
          </span>
        </div>
        <br>
        <div id="list_page_table" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
