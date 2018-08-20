@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Chuyển đổi Milk')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Chuyển đổi Milk</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <p>Số milk hiện tại {{ $tienNguoiDung->the_milk }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
