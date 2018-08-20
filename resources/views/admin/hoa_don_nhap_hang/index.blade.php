@extends('admin.layouts.master')
@section('master.bodyclass', 'hoa_don_nhap_hang')
@section('master.title', 'Hoá đơn nhập hàng')
@section('master.content')
<div id="modal"></div>
<div class="row m-t-30">
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title">Danh sách đơn hàng</h3>
      <button id="btnAdd" class="btn btn-primary">Tạo đơn nhập hàng</button>
      <div class="scrollable">
        <div class="table-responsive">
          <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          </div>
          <div id="danh_sach_don_hang_table">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="white-box">
      <h3 class="box-title">Chi tiết đơn nhập hàng</h3>
      <div class="row">
      </div>
      <div class="scrollable">
        <div id="chi_tiet_don_nhap_hang_table" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
