@extends('cong_tac_vien.layouts.master')
@section('master.bodyclass', 'ctv-ho-so')
@section('master.title', 'Hồ sơ')
@section('master.content')
@php
  $user = Auth::guard('cong_tac_vien')->user();
@endphp
@include("cong_tac_vien.ho_so.partials.upload_avatar")
<div class="row m-t-30">
  <div class="col-md-4 col-xs-12">
    <div class="white-box">
      <div class="user-bg"> <img width="100%" alt="user" src="/template/plugins/images/large/img1.jpg">
        <div class="overlay-box">
          <div class="user-content">
            <a href="javascript:void(0)" class="avatar_wrapper" id="openAvatarUploader">
              <img src="{{ $user->avatar }}" class="thumb-lg img-circle" alt="img">
            </a>
            <h4 class="text-white">{{ $user->ho_va_ten }}</h4>
            <h5 class="text-white">{{ $user->email }}</h5>
          </div>
        </div>
      </div>
      <div class="user-btm-box">
        <table id="profile-info" class="table">
          <tbody>
            <tr>
              <td class="font-bold">Giới tính</td>
              <td>{{ $user->gioi_tinh }}</td>
            </tr>
            <tr>
              <td class="font-bold">CMND</td>
              <td>{{ $user->cmnd }}</td>
            </tr>
            <tr>
              <td class="font-bold">Số điện thoại</td>
              <td>{{ $user->so_dien_thoai }}</td>
            </tr>
            <tr>
              <td class="font-bold">Địa chỉ</td>
              <td>{{ $user->dia_chi_hien_tai }}</td>
            </tr>
            <tr>
              <td class="font-bold">Ngày sinh</td>
              <td>{{ substr($user->ngay_sinh, 0, 10) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-8 col-xs-12">
    <div class="white-box">
      <ul class="nav nav-tabs tabs customtab">
        <li class="tab active">
          <a href="#ho_so_cua_ban" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Hồ sơ của bạn</span> </a>
        </li>
        <li class="tab">
          <a href="#doi_mat_khau" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Đổi mật khẩu</span> </a>
        </li>
        <li class="tab">
          <a href="#tai_khoan_ngan_hang" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Tài khoản ngân hàng</span> </a>
        </li>
        <li class="tab">
          <a href="#anh_xac_thuc" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Ảnh xác thực</span> </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="ho_so_cua_ban">
          @include('cong_tac_vien.ho_so.partials.ho_so_cua_ban')
        </div>
        <div class="tab-pane" id="doi_mat_khau">
          @include('cong_tac_vien.ho_so.partials.doi_mat_khau')
        </div>
        <div class="tab-pane" id="tai_khoan_ngan_hang">
          @include('cong_tac_vien.ho_so.partials.tai_khoan_ngan_hang')
        </div>
        <div class="tab-pane" id="anh_xac_thuc">
          @include('cong_tac_vien.ho_so.partials.anh_xac_thuc')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
