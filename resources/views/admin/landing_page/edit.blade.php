@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-landing_page-create')
@section('master.title', 'Update Landing Page')
@section('master.content')
<form action="{{ route('admin.landing_page.update', $theme->id) }}" method="POST" enctype="multipart/form-data">
  {{ method_field('PUT') }}
  {{ csrf_field() }}

  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Cập nhật trang Landing Page</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <button type="submit" class="btn btn-info pull-right m-l-20 waves-effect waves-light">Lưu Trang</button>
    </div>
  </div>

  @include('admin.landing_page.partials.update.theme_info')
  @include('admin.landing_page.partials.update.section_builder', compact('sections'))
  @include('admin.landing_page.partials.update.footer_builder')
  <div class="white-box">
    <button type="submit" class="btn btn-info waves-effect waves-light">Lưu Trang</button>
  </div>
</form>
@endsection
