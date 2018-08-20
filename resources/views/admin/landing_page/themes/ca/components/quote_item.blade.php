<div class="form-horizontal">

  <div class="form-group">
    <label class="control-label col-sm-3">Hình Tác Giả</label>
    <div class="col-sm-9">
      @php
        $fileUpload = str_random();
      @endphp
      <input type="file" id="dropify_{{ $fileUpload }}" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][author_image_url][]" data-allowed-file-extensions="jpeg jpg png gif">
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
    <label class="control-label col-sm-3">Tên Tác Giả</label>
    <div class="col-sm-9">
      <input type="author" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][author][]" class="form-control" placeholder="Author">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3">Trích Dẫn</label>
    <div class="col-sm-9">
      <textarea name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}][content][]" rows="3" class="form-control"></textarea>
    </div>
  </div>

</div>
