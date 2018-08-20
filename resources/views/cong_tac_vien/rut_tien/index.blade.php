@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Rút tiền')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Rút tiền</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="input-group">
            <input type="text" class="form-control" id="so_tien_muon_rut" placeholder="Số tiền muốn rút"/>
            <span id="btnRutTien" class="input-group-addon">Rút tiền</span>
          </div>
          <div class="form-group m-t-10">
            <p class="text-danger">Ngân hàng: {{ $thongTinNganHang }}</p>
          </div>
          <br>
          <div id="rut_tien_body" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
