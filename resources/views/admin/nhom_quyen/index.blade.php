@extends('admin.layouts.master')
@section('master.title', 'Quản lý nhóm quyền')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh-rules" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách nhóm quyền
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table color-table inverse-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên nhóm</th>
              <th>Mô tả</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="nhom-quyen-body">
            <tr>
              <td colpan="4">Không có dữ liệu</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm nhóm quyền</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Tên nhóm</label>
            <input type="text" class="form-control m-t-5" id="ten-nhom" placeholder="Tên nhóm">
          </div>
          <div class="form-group">
            <label>Mô tả</label>
            <input type="text" class="form-control m-t-5" id="mo-ta" placeholder="Mô tả">
          </div>
          <div class="form-group">
            <button id="btnAdd" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
            <button id="btnCancel" class="btn btn-inverse waves-effect waves-light">Huỷ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
