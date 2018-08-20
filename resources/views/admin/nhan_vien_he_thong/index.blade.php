@extends('admin.layouts.master')
@section('master.title', 'Quản lý nhân viên hệ thống')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh-bank" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách nhân viên hệ thống
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Email</th>
              <th>Tên</th>
              <th>Nhóm quyền</th>
              <th>Mô tả nhóm</th>
              <th>Block</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="admin-body">
            <tr>
              <td colspan="5">Không có dữ liệu</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
