<div class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2">Tải Ảnh</label>
    <div class="col-sm-10">
      @php
        $fileUpload = str_random();
      @endphp
      <input type="file" id="dropify_{{ $fileUpload }}" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][image_url][]" data-allowed-file-extensions="jpeg jpg png gif">
      <script type="text/javascript">
        $(function () {
          if ($('#dropify_{{ $fileUpload }}').length > 0) {
            $('#dropify_{{ $fileUpload }}')
              .dropify()
              .on('dropify.beforeClear', function (event, element) {
                console.log(event);
                confirm("Do you really want to delete \"" + element.filename + "\" ?");
              });
          }
        });
      </script>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Liên Kết</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][url][]">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tiêu Đề</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][title][]">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tiêu Đề Phụ</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" rows="3" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][subtitle][]"></textarea>
    </div>
  </div>
  @php
    $contentName = str_random();
  @endphp
  <div class="form-group">
    <label class="control-label col-md-2">Nội Dung</label>
    <div class="col-md-10">
      <textarea name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][content][]" id="content_editor_{{ $contentName }}" class="tiny-editor"></textarea>
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
