<div class="row">
  <div class="col-sm-7">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="box-title">Thông tin chung</h3>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">

          <div class="form-group">
            <label class="col-sm-12">Logo</label>
            <div class="col-sm-12">
              @php
              $fileUpload = str_random();
              @endphp
              <input type="file" id="dropify_{{ $fileUpload }}" name="info[logo]" data-allowed-file-extensions="jpeg jpg png gif">
              <script type="text/javascript">
                $(function () {
                  if ($('#dropify_{{ $fileUpload }}').length > 0) {
                    $('#dropify_{{ $fileUpload }}').dropify();
                  }
                });
              </script>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Tiêu Đề</label>
            <div class="col-sm-12">
              <input type="text" name="info[title]" class="form-control" placeholder="Tiêu Đề" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">URL</label>
            <div class="col-sm-12">
              <div class="loading-input__wrapper">
                <input type="text" name="info[url]" class="form-control form-url" placeholder="URL" />
                <span class="loading-input__indicator">
                  <i class="fa fa-spin fa-spinner"></i>
                </span>
              </div>
              <span class="help-block"></span>
            </div>
          </div>

          {{-- @php
          $contentName = str_random();
          @endphp
          <div class="form-group">
            <label class="col-md-12">Content</label>
            <div class="col-md-12">
              <textarea name="info[content]" id="content_editor_{{ $contentName }}"></textarea>
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
          </script> --}}

          <div class="form-group">
            <label class="col-sm-12">Hotline</label>
            <div class="col-sm-12">
              <input type="text" name="info[hotline]" class="form-control" placeholder="Hotline">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Additional JS Script</label>
            <div class="col-sm-12">
              <textarea name="info[script_js]" class="form-control" rows="4" placeholder="Chat JS Script, Facebook Pixel JS Script, Google Analytics Script, etc."></textarea>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  <div class="col-sm-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="box-title">Meta &amp; S.E.O.</h3>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-12">Keywords</label>
            <div class="col-sm-12">
              <div class="tags-default">
                <input type="text" name="info[keywords]" data-role="tagsinput" placeholder="Keywords" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12">Tags</label>
            <div class="col-sm-12">
              <div class="tags-default">
                <input type="text" name="info[tags]" data-role="tagsinput" placeholder="Tags" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
                <label>
                  <div class="radio radio-info">
                    <input checked type="radio" data-toggle="collapse" data-target="#sanPhamCollapse" name="info[is_muon_ban]" class="checkRadio" id="radio1" value="YES" value="option1">
                    <label for="radio1">Muốn bán</label>
                  </div>
                </label>
                <label style="margin-left: 20px">
                  <div class="radio radio-info">
                    <input type="radio" name="info[is_muon_ban]" data-toggle="collapse" data-target="#sanPhamCollapse" class="checkRadio" id="radio2" value="NO"">
                    <label for="radio2">Không muốn bán </label>
                  </div>
                </label>
            </div>
          </div>
          <div class="panel-collapse collapse in" id="sanPhamCollapse">
            <div class="form-group sanPham">
              <label class="col-sm-12">Sản phẩm muốn bán</label>
              <div class="col-sm-12">
                <select name="info[san_pham_muon_ban_id]" class="form-control">
                  @foreach($sanPham as $item)
                  <option value="{{ $item->id }}" san_pham_ten="{{ $item->san_pham_ten }}">[{{ $item->san_pham_ma }}] {{ $item->san_pham_ten }} ({{ number_format($item->san_pham_gia_ban_thuc_te) }} VND)</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12">Nội dung nút Submit</label>
            <div class="col-sm-12">
              <input type="text" name="info[ten_nut]" class="form-control" placeholder="Nội dung nút Submit">
            </div>
          </div>


          @php
          $landingThemeId = str_random();
          @endphp

          <div class="form-group">
            <label class="col-sm-12">Thông báo</label>
            <div class="col-sm-12">
              <textarea name="info[thong_bao]" class="form-control" placeholder="Thông báo"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Nội dung Email</label>
            <div class="col-sm-12">
              <textarea id="noi_dung_email_{{ $landingThemeId }}" class="tiny-editor" name="info[noi_dung_email]"></textarea>
            </div>
          </div>

          <script type="text/javascript">
            $(function () {
              if ($("#noi_dung_email_{{ $landingThemeId }}").length > 0) {
                tinymce.init({
                  selector: "#noi_dung_email_{{ $landingThemeId }}",
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
