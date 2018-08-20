@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Đại lý của tôi')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Danh sách đại lý của tôi</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs m-b-15" role="tablist">
                <li role="presentation" class="active"><a class="tab" value="1" href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Thành viên có doanh thu</span></a></li>
                <li role="presentation"><a class="tab" value="2" href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Tất cả thành viên tôi quản lý</span></a></li>
              </ul>
              <div class="input-group">
                <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
                <span class="input-group-addon">
                  <i id="btnSearch"  class="fa fa-search"> </i>
                </span>
              </div>
              <br>
              <!-- Tab panes -->
            </div>
            <div class="col-xs-12">
              <div id="toi_gioi_thieu_table" class="table-responsive">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
