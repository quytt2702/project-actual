@extends('admin.layouts.master')
@section('master.title', 'Sửa trang')
@section('master.content')
<script src="/cktemplate/ckeditor/ckeditor.js"></script>
<div id="changeModal"></div>
<div class="row m-t-30">
  <form action="{{ route('admin.quan_ly_trang.update', ['id' => $tmdtPage->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="box-title">Sửa trang</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label>Tên trang</label>
              <input id="ten_trang" name="ten_trang" type="text" class="form-control" value="{{ $tmdtPage->ten_trang }}">
            </div>
            <div class="form-group">
              <label>URL trang</label>
              <div class="input-group">
                <input type="hidden" name="url" id="url_backup">
                <input id="url" class="form-control" placeholder="Url được sinh từ tiêu đề" disabled>
                <span class="input-group-btn">
                  <button id="edit_link" type="button" class="btn btn-success">Chỉnh sửa</button>
                  <button id="cancel_link" type="button" class="btn btn-default" style="display: none;">Huỷ bỏ</button>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Tags</label>
              <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{ $tmdtPage->tags }}">
            </div>
            <div class="form-group">
              <label>Keywords</label>
              <input type="text" class="form-control" name="keywords" data-role="tagsinput" value="{{ $tmdtPage->keywords }}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="box-title">Tạo nội dung cho các mục</h3>
        </div>
      </div>

      <div id="chosen_sections" class="chosen-section__container">
        @php
          $sections = json_decode($tmdtPage->sections);
        @endphp
        @foreach ($sections as $item)
          @php
            // echo json_encode($item);
            $section = array_merge($tmdtSectionKey[$item->section_id], (Array) $item);
            $strRandom = str_random();
            // dd($item);
          @endphp
          @include('admin.quan_ly_trang.partials.edit_section_item')
        @endforeach
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="box-title">Chọn mục</h3>
        </div>
        <div class="panel-body">
          <div id="section-selectors" class="theme-sections__container">
            @foreach($tmdtSection as $item)
            <div class="theme-sections__selection">
              <span class="selection__wrapper">
                <span class="backdrop__wrapper">
                  <span class="backdrop__content">
                    <span style="display: block; color: #fff; height: 28px;">{{ $item->ten }}</span>
                    <a href="{{ $item->image }}" class="image-popup"><i class="ti-zoom-in"></i></a>
                    <a href="javascript:void(0)" class="add_section" data-section-code="{{ $item->id }}" data-code="admin.landing_page.themes.ca.section_1_1"><i class="ti-plus"></i></a>
                  </span>
                </span>
                <img src="/lands/icons/section_1_1.png">
              </span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
