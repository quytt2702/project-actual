@extends('admin.layouts.master')
@section('master.title', 'Link bán sản phẩm')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12 col-lg-12 col-sm-7">
    <div class="panel panel-info">
      <div class="panel-heading">Link bán sản phẩm</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <br>
          <div id="kich_hoat_link_body">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
