@extends('admin.layouts.master')
{{-- @section('master.bodyclass', 'admin-ngon-ngu') --}}
@section('master.title', 'Quản lý đại lý')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Quản lý đại lý
      </h3>
      <div id="dai_ly_body" class="m-t-20 table-responsive">
      </div>
    </div>
  </div>
</div>
@endsection
