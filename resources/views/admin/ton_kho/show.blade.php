@extends('admin.layouts.master')
@section('master.title', 'Chi tiết sản phẩm đã bán')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">CHI TIẾT SẢN PHẨM ĐÃ BÁN</div>
        <div class="input-group">
          <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
          <span class="input-group-addon">
            <i id="btnSearch"  class="fa fa-search"> </i>
          </span>
        </div>
        <br>
      <div id="body-chi-tiet-ton-kho" hash="{{ $id }}"></div>
    </div>
  </div>
</div>
@endsection
