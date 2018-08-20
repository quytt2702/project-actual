@php
  $fileUpload = str_random();
@endphp
<input type="file" id="dropify_{{ $fileUpload }}" name="data[{{ $section_name }}_{{ $sectionHash }}][{{ $field_name }}]" data-allowed-file-extensions="jpeg jpg png gif">
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
