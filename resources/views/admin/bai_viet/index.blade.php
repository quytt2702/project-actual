@extends('admin.layouts.master')
@section('master.title', 'Quản lý bài viết')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">QUẢN LÝ BÀI VIẾT</div>
      <div class="row">
        <div class="col-xs-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs m-b-15" role="tablist">
            <li id="active" role="presentation" class="active"><a class="lang" value="1" href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Bài viết</span></a></li>
            <li id="trash" role="presentation" class=""><a class="lang" value="2" href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Thùng rác</span></a></li>
          </ul>
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm"/>
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <!-- Tab panes -->
        </div>
        <div id="bai-viet-body">
        </div>
        <div class="col-xs-12">
          <div class="pull-left">
            <a href="{{ route('admin.bai_viet.add') }}" type="button" class="btn btn-primary">Thêm bài viết</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
