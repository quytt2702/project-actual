@extends('admin.layouts.master')
@section('master.bodyclass', 'hoa-don-thang-nam')
@section('master.title', 'Chi tiết')
@section('master.content')
<div id="modal-hd-ngay-thang-nam"></div>
<div class="row m-t-30">
  <div class="col-sm-12">
    <div class="white-box">
      <div class="box-title">Chi tiết</div>
      <div class="row">
        <div id="thong_ke_doanh_thu_ban_hang_chi_tiet" hash="{{ $id }}">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
