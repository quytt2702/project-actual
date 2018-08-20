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
              <input type="file" id="dropify_{{ $fileUpload }}" name="info[logo]" data-default-file="{{ $theme->logo }}" data-allowed-file-extensions="jpeg jpg png gif">
              <input type="hidden" name="info[logo_old]" value="{{ $theme->logo }}">
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
              <input type="text" name="info[title]" class="form-control" placeholder="Tiêu Đề" value="{{ $theme->title }}"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">URL</label>
            <div class="col-sm-12">
              <div class="loading-input__wrapper">
                <input type="text" name="info[url]" class="form-control form-url" placeholder="URL" value="{{ $theme->url }}" />
                <span class="loading-input__indicator">
                  <i class="fa fa-spin fa-spinner"></i>
                </span>
              </div>
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Hotline</label>
            <div class="col-sm-12">
              <input type="text" name="info[hotline]" class="form-control" placeholder="Hotline" value="{{ $theme->hotline }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Additional JS Script</label>
            <div class="col-sm-12">
              <textarea name="info[script_js]" class="form-control" rows="4" placeholder="Chat JS Script, Facebook Pixel JS Script, Google Analytics Script, etc.">{{ $theme->script_js }}</textarea>
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
                <input type="text" name="info[keywords]" data-role="tagsinput" placeholder="Keywords" value="{{ $theme->keywords }}" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12">Tags</label>
            <div class="col-sm-12">
              <div class="tags-default">
                <input type="text" name="info[tags]" data-role="tagsinput" placeholder="Tags" value="{{ $theme->tags }}" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
                <label>
                  <div class="radio radio-info">
                    <input type="radio" name="info[is_muon_ban]" data-toggle="collapse" data-target="#sanPhamCollapse" id="radio1" {{ ($theme->is_muon_ban === 'YES') ? 'checked' : '' }} value="YES" value="option1">
                    <label for="radio1"> Muốn bán</label>
                  </div>
                </label>
                <label style="margin-left: 20px">
                  <div class="radio radio-info">
                    <input type="radio" name="info[is_muon_ban]" data-toggle="collapse" data-target="#sanPhamCollapse" id="radio2" {{ ($theme->is_muon_ban === 'NO') ? 'checked' : '' }} value="NO"">
                    <label for="radio2">Không muốn bán </label>
                  </div>
                </label>
            </div>
          </div>
          <div class="panel-collapse collapse {{ ($theme->is_muon_ban === 'YES') ? 'in' : '' }}" id="sanPhamCollapse">
            <div class="form-group sanPham">
              <label class="col-sm-12">Sản phẩm muốn bán</label>
              <div class="col-sm-12">
                <select name="info[san_pham_muon_ban_id]" class="form-control">
                  @foreach($sanPham as $item)
                  <option value="{{ $item->id }}" {{ ($item->id === $theme->san_pham_muon_ban_id) ? 'selected' : ''}} san_pham_ten="{{ $item->san_pham_ten }}">[{{ $item->san_pham_ma }}] {{ $item->san_pham_ten }} ({{ number_format($item->san_pham_gia_ban_thuc_te) }} VND)</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12">Nội dung nút Submit</label>
            <div class="col-sm-12">
              <input type="text" name="info[ten_nut]" class="form-control" placeholder="Nội dung nút Submit" value="{{ $theme->ten_nut }}">
            </div>
          </div>

          @php
          $landingThemeId = str_random();
          @endphp

          <div class="form-group">
            <label class="col-sm-12">Thông báo</label>
            <div class="col-sm-12">
              <textarea name="info[thong_bao]" class="form-control" placeholder="Thông báo">{{ $theme->thong_bao }}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12">Nội dung Email</label>
            <div class="col-sm-12">
              <textarea id="noi_dung_email_{{ $landingThemeId }}" class="tiny-editor" name="info[noi_dung_email]">{{ $theme->noi_dung_email }}</textarea>
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
