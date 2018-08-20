<div class="form-horizontal">

  <div class="form-group">
    <label class="control-label col-sm-3">Ảnh Tác Giả</label>
    <div class="col-sm-9">
      @php
        $fileUpload = str_random();
      @endphp
      <input type="file" id="dropify_{{ $fileUpload }}" name="data[{{ $section->hash }}][{{ $field_name }}][author_image_url][]" data-default-file="{{ @$section->quotes[$quoteIndex]->author_image_url }}" data-allowed-file-extensions="jpeg jpg png gif">
      <input type="hidden" name="data[{{ $section->hash }}][{{ $field_name }}][author_image_url_old][]" value="{{ @$section->quotes[$quoteIndex]->author_image_url }}">
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
    <label class="control-label col-sm-3">Tác Giả</label>
    <div class="col-sm-9">
      <input type="author" name="data[{{ $section->hash }}][{{ $field_name }}][author][]" class="form-control" placeholder="Tác Giả" value="{{ @$section->quotes[$quoteIndex]->author }}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3">Trích Dẫn</label>
    <div class="col-sm-9">
      <textarea name="data[{{ $section->hash }}][{{ $field_name }}][content][]" rows="3" class="form-control">{{ @$section->quotes[$quoteIndex]->content }}</textarea>
    </div>
  </div>

</div>
