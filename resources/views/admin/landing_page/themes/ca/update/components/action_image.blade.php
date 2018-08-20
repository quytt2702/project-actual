<div class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2">Liên Kết Ảnh</label>
    <div class="col-sm-10">
      @php
        $fileUpload = str_random();
      @endphp
      <input type="file" id="dropify_{{ $fileUpload }}" name="data[{{ $section->hash }}][{{ $field_name }}][image_url][]" data-default-file="{{ @$section->actionImages[$actionIndex - 1]->image_url }}" data-allowed-file-extensions="jpeg jpg png gif">
      <input type="hidden" name="data[{{ $section->hash }}][{{ $field_name }}][image_url_old][]" value="{{ @$section->actionImages[$actionIndex - 1]->image_url }}">
      <script type="text/javascript">
        $(function () {
          if ($('#dropify_{{ $fileUpload }}').length > 0) {
            $('#dropify_{{ $fileUpload }}')
              .dropify()
              .on('dropify.beforeClear', function (event, element) {
                var dropify = $(this).data('dropify');
                swal({
                  title: "Bạn có chắc chắn muốn xoá?",
                  type: "warning",
                  showCancelButton: true,
                  cancelButtonText: "Không",
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Có",
                  closeOnConfirm: true,
                  html: false
                }, function() {
                  dropify.resetPreview();
                  dropify.clearElement();

                  $(event.target).parent().parent().find('input[type=hidden]').val('');
                });

                return false;
              });
          }
        });
      </script>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data[{{ $section->hash }}][{{ $field_name }}][url][]" value="{{ @$section->actionImages[$actionIndex - 1]->url }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tiêu Đề</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data[{{ $section->hash }}][{{ $field_name }}][title][]" value="{{ @$section->actionImages[$actionIndex - 1]->title }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tiêu đề phụ</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" rows="3" name="data[{{ $section->hash }}][{{ $field_name }}][subtitle][]">{{ @$section->actionImages[$actionIndex - 1]->subtitle }}</textarea>
    </div>
  </div>
  @php
    $contentName = str_random();
  @endphp
  <div class="form-group">
    <label class="control-label col-md-2">Nội dung</label>
    <div class="col-md-10">
      <textarea name="data[{{ $section->hash }}][{{ $field_name }}][content][]" id="content_editor_{{ $contentName }}" class="tiny-editor">{{ @$section->actionImages[$actionIndex - 1]->content }}</textarea>
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
