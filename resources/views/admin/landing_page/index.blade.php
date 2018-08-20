@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-landing_page')
@section('master.title', 'Landing Pages')
@section('master.content')
<div class="row bg-title">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  </div>
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <a href="{{ route('admin.landing_page.create') }}" class="btn btn-info pull-right m-l-20 waves-effect waves-light">Tạo mới</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3>Các trang Landing Page đã tạo</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table color-table inverse-table">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-left">Tiêu Đề</th>
            <th class="text-left">URL</th>
            <th class="text-left">Ngày Tạo</th>
            <th class="text-center">Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($themes->items() as $index => $theme)
            <tr>
              <td class="text-center">{{ $themes->perPage() * ($themes->currentPage() - 1) + $index + 1 }}</td>
              <td class="text-left">{{ $theme->title or '-' }}</td>
              <td class="text-left"><a target="_blank" href="{{ url($theme->url) }}">{{ $theme->url }}</a></td>
              <td class="text-left">{{ $theme->updated_at->diffForHumans() }}</td>
              <td class="text-center">
                <a href="{{ route('admin.landing_page.preview', $theme->id) }}" class="btn btn-xs btn-info">Xem Trước</a>
                <a href="{{ route('admin.landing_page.edit', $theme->id) }}" class="btn btn-xs btn-success">Cập Nhật</a>
                <a href="{{ route('admin.landing_page.destroy', $theme->id) }}" class="btn btn-xs btn-danger btn-xoa-page">Xoá</a>
              </td>
            </tr>
            <tr></tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $themes->render() }}
  </div>
</div>
@endsection
