@extends('admin.layouts.master')
@section('master.title', 'Chọn trang chủ')
@section('master.content')
<div id="modal">
</div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title">Chọn trang chủ</h3>
      <div class="scrollable">
        <div id="urls_table">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
