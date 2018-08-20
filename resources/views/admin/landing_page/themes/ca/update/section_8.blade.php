@php
  $sectionHash = str_random();
@endphp
<input type="hidden" name="data[{{ $section->hash }}][code]" value="{{ $section->code }}">
<div class="selected-section__wrapper">
  <div class="selected-section__toolbar">
    <div class="toolbar__wrapper">
      <div class="toolbar__handlebar">Section 8</div>
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
      @include('admin.landing_page.themes.ca.update.components.menu_title')

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Ảnh Nền</h4>
          @include('admin.landing_page.themes.ca.update.components.image_uploader', [
            'section_name' => 'section_8',
            'field_name' => 'background_image',
          ])
          <input type="hidden" name="data[{{ $section->hash }}][background_image_old]" value="{{ $section->background_image }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Màu Nền</h4>
          @include('admin.landing_page.themes.ca.update.components.color_picker', [
            'section_name' => 'section_8',
          ])
        </div>
      </div>

    </div>

    @include('admin.landing_page.themes.ca.update.components.quotes', [
      'section_name' => $section->code,
      'field_name' => 'quotes',
    ])


    @include('admin.landing_page.themes.ca.components.close_link')
  </div>
</div>
