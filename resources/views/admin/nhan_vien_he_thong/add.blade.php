@extends('admin.layouts.master')
@section('master.title', 'Trang thêm nhân viên hệ thống')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm admin</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control m-t-5" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control m-t-5" id="ho_va_ten" placeholder="Họ và tên">
          </div>
          <div class="form-group">
            <label>Nhóm quyền</label>
            <select class="form-control" id="nhom_quyen">
              @foreach($nhomQuyen as $item)
                <option value="{{ $item->id }}">{{ $item->ten_nhom }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" class="form-control m-t-5" id="mat_khau" placeholder="Mật khẩu">
          </div>
          <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input type="password" class="form-control m-t-5" id="mat_khau_confirmation" placeholder="Nhập lại mật khẩu">
          </div>
          <button id="btnAdd" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
          <button id="btnBack" class="btn btn-inverse waves-effect waves-light">Trở về</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
