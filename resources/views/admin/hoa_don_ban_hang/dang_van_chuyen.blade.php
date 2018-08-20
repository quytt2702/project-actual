@extends('admin.layouts.master')
@section('master.title', 'Hoá đơn bán hàng đang vận chuyển')
@section('master.content')
<div id="modal">
</div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title">Hoá đơn bán hàng đang vận chuyển</h3>
      <div class="scrollable">
        <div id="hoa_don_ban_hang_table" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
