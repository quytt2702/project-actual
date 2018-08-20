@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-landing_page-create')
@section('master.title', 'Landing Page Builder')
@section('master.content')
<form id="createLandingPageForm" action="{{ route('admin.landing_page.preview.post') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Tạo trang Landing Page</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <button type="submit" class="btn btn-info pull-right m-l-20 waves-effect waves-light">Lưu Trang</button>
    </div>
  </div>

  @include('admin.landing_page.partials.theme_info')
  @include('admin.landing_page.partials.section_builder', compact('sections'))
  @include('admin.landing_page.partials.footer_builder')
  <div class="white-box">
    <button type="submit" class="btn btn-info waves-effect waves-light">Lưu Trang</button>
  </div>
</form>
@endsection
