@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Quản lý nạp Milk')
@section('master.content')
<div id="modal-show"></div>
<div class="row m-t-30">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">Quản lý nạp Milk</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <br>
          <div class="row m-b-20">
            <div class="col-md-5">
              <input type="text" id="ma_nap_diem" class="form-control" placeholder="Mã nạp Milk">
            </div>
            <div class="col-md-5">
              <input type="text" id="seri" class="form-control" placeholder="Seri">
            </div>
            <div class="col-md-2">
              <button id="btnNap" class="btn btn-primary">Nạp</button>
            </div>
          </div>
          <div id="lich_su_nap_diem_table" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">Lịch sử mua hàng bằng Milk</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row m-b-20">
            <div class="col-md-12">
              <div id="lich_su_mua_hang_bang_milk" class="table-responsive">
              </div>
            </div>
          </div>
          <div id="lich_su_nap_diem_table" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
