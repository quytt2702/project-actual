@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-ngon-ngu')
@section('master.title', 'Quản lý ngôn ngữ')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-10">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh-lang" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách ngôn ngữ
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-hover table-striped table-bordered">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Mã</th>
              <th>Tên</th>
              <th>Cờ</th>
              <th>Link web</th>
              <th>Hoạt động</th>
            </tr>
          </thead>
          <tbody id="ngon-ngu-body">
          </tbody>
        </table>
        <button id="btnLuu" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
</div>
@endsection
