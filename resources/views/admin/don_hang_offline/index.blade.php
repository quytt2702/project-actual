@extends('admin.layouts.master')
@section('master.title', 'Đơn hàng offline')
@section('master.content')
<div id="modal"></div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">
        Đơn hàng offline
      </div>
      <div class="form-horizontal">
        <div id="don_hang_offline_body" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
