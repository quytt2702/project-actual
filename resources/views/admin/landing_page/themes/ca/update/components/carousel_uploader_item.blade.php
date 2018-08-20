@php
  $fileUpload = str_random();
@endphp
<input type="hidden" name="data[{{ $section->hash }}][{{ $field_name }}][title][]" value="">
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
