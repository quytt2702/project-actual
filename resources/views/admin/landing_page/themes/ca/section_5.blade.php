@php
  $sectionHash = str_random();
@endphp
<input type="hidden" name="data[{{ $section_name }}_{{ $sectionHash }}][code]" value="{{ $section_name }}">
<div class="selected-section__wrapper">
  <div class="selected-section__toolbar">
    <div class="toolbar__wrapper">
      <div class="toolbar__handlebar">Section 5</div>
      <div class="toolbar__buttons">
        <a href="javascript:void(0)" class="toolbar__action caret-opener">
          <i class="fa fa-caret-up"></i>
        </a>
        <a href="javascript:void(0)" class="toolbar__action caret-closer">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="selected-section__body">
    <div class="form-horizontal">
      @include('admin.landing_page.themes.ca.components.menu_title')
      <div class="form-group">
        <label class="col-sm-12">Đường Dẫn Video</label>
        <div class="col-sm-12">
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][video_url]" type="text" class="form-control" placeholder="Đường Dẫn Video">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Ảnh Nền Xem Trước Video</h4>
          @include('admin.landing_page.themes.ca.components.image_uploader', [
            'section_name' => 'section_5',
            'field_name' => 'image_url',
          ])
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Ảnh Nền</h4>
          @include('admin.landing_page.themes.ca.components.image_uploader', [
            'section_name' => 'section_5',
            'field_name' => 'background_image',
          ])
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Màu Nền</h4>
          @include('admin.landing_page.themes.ca.components.color_picker', [
            'section_name' => 'section_5',
          ])
        </div>
      </div>
    </div>

    @include('admin.landing_page.themes.ca.components.close_link')

  </div>
</div>
