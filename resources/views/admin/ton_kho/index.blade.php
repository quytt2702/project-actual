@extends('admin.layouts.master')
@section('master.title', 'Quản lý sản phẩm tồn kho')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">QUẢN LÝ SẢN PHẨM TỒN KHO</div>
      <div class="row">
        <div class="col-xs-12">
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <br>
        </div>
        <div id="san-pham-body">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
