@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Dashboard')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="col-md-6">
      <a href="{{ route('cong_tac_vien.lich_su_giao_dich.index') }}">
        <div class="white-box">
          <h3 class="box-title">Tổng VND</h3>
          <ul class="list-inline two-part">
            <li><i class="icon-people text-info"></i></li>
            <li class="text-right"><span class="counter">{{ number_format($tienNguoiDung->tong_tien_vnd) }}</span></li>
          </ul>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{ route('cong_tac_vien.nap_diem.index') }}">
        <div class="white-box">
          <h3 class="box-title">Tổng Milk</h3>
          <ul class="list-inline two-part">
            <li><i class="icon-folder text-purple"></i></li>
            <li class="text-right"><span class="counter">{{ $tienNguoiDung->the_milk }}</span></li>
          </ul>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <div class="white-box">
        <h3 class="box-title">Doanh thu ngày</h3>
        <ul class="list-inline two-part">
          <li><i class="icon-folder-alt text-danger"></i></li>
          <li class="text-right"><span class="">{{ number_format($doanhThuNgay) }}</span></li>
        </ul>
      </div>
    </div>
    <div class="col-md-6">
      <div class="white-box">
        <h3 class="box-title">Doanh thu tuần</h3>
        <ul class="list-inline two-part">
          <li><i class="ti-wallet text-success"></i></li>
          <li class="text-right"><span class="">{{ number_format($doanhThuTuan) }}</span></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
