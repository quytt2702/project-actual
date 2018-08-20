<div class="row">
  <div class="col-sm-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Footer</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          @php
            $contentName = str_random();
          @endphp
          <label class="control-label">Nội Dung</label>
          <textarea name="footer[content]" id="content_editor_{{ $contentName }}" class="tiny-editor">
            <p style="text-align: center">Copyright {{ Carbon\Carbon::now()->year }} - LAVION.VN</p>
            <p style="text-align: center">Sản phẩm được phân phối và bán Online bởi Lavion.vn</p>
          </textarea>
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
