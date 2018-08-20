@php
  $sectionHash = str_random();
@endphp
<input type="hidden" name="data[{{ $section_name }}_{{ $sectionHash }}][code]" value="{{ $section_name }}">
<div class="selected-section__wrapper">
  <div class="selected-section__toolbar">
    <div class="toolbar__wrapper">
      <div class="toolbar__handlebar">Section 6</div>
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
        <div class="col-sm-12">
          <h4>Ảnh nền</h4>
          @include('admin.landing_page.themes.ca.components.image_uploader', [
            'section_name' => 'section_6',
            'field_name' => 'background_image',
          ])
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Màu Nền</h4>
          @include('admin.landing_page.themes.ca.components.color_picker', [
            'section_name' => 'section_6',
          ])
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-12">Tiêu Đề</label>
        <div class="col-sm-12">
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][title]" type="text" class="form-control" placeholder="Tiêu Đề">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-12">Tiêu Đề Phụ</label>
        <div class="col-md-12">
          <textarea name="data[{{ $section_name }}_{{ $sectionHash }}][subtitle]" class="form-control" rows="2" placeholder="Tiêu Đề Phụ"></textarea>
        </div>
      </div>
    </div>

    @include('admin.landing_page.themes.ca.components.carousel_uploader', [
      'section_name' => $section_name,
      'field_name' => 'action_images',
    ])


    @include('admin.landing_page.themes.ca.components.close_link')
  </div>
</div>
