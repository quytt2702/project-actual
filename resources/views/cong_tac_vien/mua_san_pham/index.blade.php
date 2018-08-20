@extends('cong_tac_vien.layouts.master')
@section('master.bodyclass', 'ctv-mua-san-pham')
@section('master.title', 'Mua sản phẩm')
@section('master.content')
<div id="modal"></div>
<br>
<div class="input-group">
  <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
  <span class="input-group-addon">
    <i id="btnSearch"  class="fa fa-search"> </i>
  </span>
</div>
<div id="mua_san_pham_body" class="row m-t-30">
</div>

@endsection
