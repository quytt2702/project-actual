@extends('admin.layouts.master')
@section('master.title', 'Quản lý tabs')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-8">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách tabs
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên tabs</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody id="tabs-body">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
