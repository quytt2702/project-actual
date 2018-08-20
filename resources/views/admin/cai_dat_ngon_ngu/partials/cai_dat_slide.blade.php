<script src="/cktemplate/ckfinder/ckfinder.js"></script>
<div class="col-md-12 m-t-30" style="border-top: 1px solid #ddd;">
  <h3>Cài đặt Slider</h3>
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên hiển thị</th>
            <th>Link</th>
            <th>Hình ảnh</th>
            <th class="text-center"></th>
          </tr>
          <tr>
            <td class="text-center">0</td>
            <td><input id="ten_hien_thi_slider" class="form-control"></td>
            <td><input id="url_slider" class="form-control url_search"></td>
            <td style="width: 150px;">
              <img id="ckfinder-input" style="width: 100%; display: none;" class="m-b-10">
              <button id="ckfinder-modal" class="btn btn-primary btn-block">Chọn hình ảnh</button>
            </td>
            <script>
              document.getElementById('ckfinder-modal').onclick = function() {
                selectFileWithCKFinder('ckfinder-input');
              };

              function selectFileWithCKFinder(elementId) {
                CKFinder.modal({
                  chooseFiles: true,
                  width: 800,
                  height: 600,
                  onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                      var file = evt.data.files.first();
                      // var output = document.getElementById( elementId );
                      // output.value = file.getUrl();
                      document.getElementById('ckfinder-input').src = file.getUrl();
                    });

                    finder.on( 'file:choose:resizedImage', function( evt ) {
                      var output = document.getElementById(elementId);
                      output.src = evt.data.resizedUrl;
                      document.getElementById('ckfinder-input').src = evt.data.resizedUrl;
                    });
                  }
                });
                $('#ckfinder-input').css('display', 'block');
              }
            </script>
            <td class="text-center"><button id="btnAddSlider" class="btn btn-circle btn-outline btn-success">+</button></td>
          </tr>
        </thead>
        <tbody id="slider_body">
        </tbody>
      </table>
      <div class="checkbox checkbox-primary">
        <input id="checkbox" type="checkbox" class="checkboxes" {{ ($caiDatNgonNgu->is_slider === 'YES') ? 'checked' : '' }}>
        <label for="checkbox">Hiện slide</label>
      </div>
      <button class="btn btn-success" id="btnLuuIsSlider">Lưu</button>
    </div>
  </div>
</div>
