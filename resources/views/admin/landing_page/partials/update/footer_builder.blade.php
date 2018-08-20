<div class="row">
  <div class="col-sm-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Footer Builder</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label">Logo</label>
          @php
            $fileUpload = str_random();
          @endphp
          <input type="file" id="dropify_{{ $fileUpload }}" name="footer[logo]" data-default-file="{{ $theme->footer->logo }}" data-allowed-file-extensions="jpeg jpg png gif">
          <input type="hidden" name="footer[logo_old]" value="{{ $theme->footer->logo }}">
          <script type="text/javascript">
            $(function () {
              if ($('#dropify_{{ $fileUpload }}').length > 0) {
                $('#dropify_{{ $fileUpload }}').dropify();
              }
            });
          </script>
        </div>
        <div class="form-group">
          @php
            $contentName = str_random();
          @endphp
          <label class="control-label">Nội Dung</label>
          <textarea name="footer[content]" id="content_editor_{{ $contentName }}" class="tiny-editor">{{ $theme->footer->content }}</textarea>
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
      </div>
    </div>
  </div>
</div>
