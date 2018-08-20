<input type="hidden" name="data[{{ $section->hash }}][code]" value="{{ $section->code }}">
<div class="selected-section__wrapper">
  <div class="selected-section__toolbar">
    <div class="toolbar__wrapper">
      <div class="toolbar__handlebar">Section 1.3</div>
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
          <h4>Ảnh Trước</h4>
          @include('admin.landing_page.themes.ca.update.components.image_uploader', [
            'section_name' => $section->code,
            'field_name' => 'image_url',
          ])
          <input type="hidden" name="data[{{ $section->hash }}][image_url_old]" value="{{ $section->image_url }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Ảnh Nền</h4>
          @include('admin.landing_page.themes.ca.update.components.image_uploader', [
            'section_name' => $section->code,
            'field_name' => 'background_image',
          ])
          <input type="hidden" name="data[{{ $section->hash }}][background_image_old]" value="{{ $section->background_image }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <h4>Màu Nền</h4>
          @include('admin.landing_page.themes.ca.update.components.color_picker', [
            'section_name' => $section->code,
          ])
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-12">Tiêu Đề</label>
        <div class="col-sm-12">
          <input name="data[{{ $section->hash }}][title]" type="text" class="form-control" placeholder="Tiêu Đề" value="{{ $section->title }}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-12">Tiêu Đề Phụ</label>
        <div class="col-md-12">
          <textarea name="data[{{ $section->hash }}][subtitle]" class="form-control" rows="2" placeholder="Tiêu Đề Phụ">{{ $section->subtitle }}</textarea>
        </div>
      </div>

      @php
        $contentName = str_random();
      @endphp
      <div class="form-group">
        <label class="col-md-12">Nội Dung</label>
        <div class="col-md-12">
          <textarea name="data[{{ $section->hash }}][content]" id="content_editor_{{ $contentName }}" class="tiny-editor">{{ $section->content }}</textarea>
        </div>
      </div>
      <script type="text/javascript">
        $(function () {
          if ($("#content_editor_{{ $contentName }}").length > 0) {
            tinymce.init({
              selector: "#content_editor_{{ $contentName }}",
              theme: "modern",
              height: 150,
            });
          }
        });
      </script>
    </div>
    <hr>
    <div class="form-group">
      @include('admin.landing_page.themes.ca.update.components.links', [
        'section_name' => $section->code,
        'section' => $section,
      ])
    </div>

    @include('admin.landing_page.themes.ca.components.close_link')
  </div>
</div>
