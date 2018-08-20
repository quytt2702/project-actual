<div class="col-md-12">
  <h3 class="m-b-0">Cài đặt thông số </h3>
  <p class="text-muted m-b-10 font-10">(Khuyên dùng 5/7 trang xã hội)</p>
</div>
<div class="col-md-6">
  <form class="form-horizontal">
    <div class="form-group">
      <input type="hidden" id="don_vi_hien_thi">
      <div class="col-md-12">
        <div class="input-group">
          <div class="input-group-addon">Tiêu đề trang web</div>
          <input type="text" class="form-control" id="tieu_de_trang_web" placeholder="Tiêu đề trang web" value="{{ $caiDatNgonNgu->tieu_de_trang_web }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Loại tiêu đề web</div>
          <select id="loai_tieu_de_web" class="form-control">
            <option {{ ($caiDatNgonNgu->loai_tieu_de_web === 'CHU') ? 'selected' : '' }} value="0">Kiểu chữ</option>
            <option {{ ($caiDatNgonNgu->loai_tieu_de_web === 'HINH') ? 'selected' : '' }} value="1">Kiểu hình</option>
          </select>
        </div>
        <div class="input-group">
          <div class="input-group-addon">Hotline</div>
          <input type="text" class="form-control" id="hotline" placeholder="Hotline" value="{{ $caiDatNgonNgu->hotline }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Điện thoại</div>
          <input type="text" class="form-control" id="sdt" placeholder="Điện thoại" value="{{ $caiDatNgonNgu->sdt }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Chat JS</div>
          <input type="text" class="form-control" id="chat_js" placeholder="Chat JS" value="{{ $caiDatNgonNgu->chat_js }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Tỉ giá Milk</div>
          <input type="number" class="form-control" id="ti_gia_milk" placeholder="Tỉ giá Milk" value="{{ $caiDatNgonNgu->ti_gia_milk }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Đơn vị tính</div>
          <input type="text" class="form-control" id="don_vi_tinh" placeholder="Đơn vị tính" value="{{ $caiDatNgonNgu->don_vi_tinh }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Đơn hàng đầu</div>
          <input type="text" class="form-control" id="don_hang_dau" placeholder="Đơn hàng đầu" value="{{ $caiDatNgonNgu->don_hang_dau }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Đơn hàng sau</div>
          <input type="text" class="form-control" id="don_hang_sau" placeholder="Đơn hàng sau" value="{{ $caiDatNgonNgu->don_hang_sau }}">
        </div>
        <div class="input-group">
          <div class="logo-web">
            <img id="img-logo" src="{{ $caiDatNgonNgu->logo_web }}" style='{{ empty($caiDatNgonNgu->logo_web)? "display: none" : ""}}' class="m-b-10">
            <a href="javascript:" id="xoa-logo" style='{{ empty($caiDatNgonNgu->logo_web)? "display: none" : ""}}'><i class="fa fa-close text-danger style"></i></a>
            <a id="ckfinder-logo" class="btn btn-default btn-block">Chọn logo trang web</a>
          </div>
        </div>
        <script>
          $('#ckfinder-logo').on('click', function () {
            console.log('da click [ckfinder-logo]')
            CKFinder.modal({
              chooseFiles: true,
              width: 800,
              height: 600,
              onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                  var file = evt.data.files.first();
                  $('#img-logo').attr('src', file.getUrl());
                });

                finder.on( 'file:choose:resizedImage', function( evt ) {
                  var output = document.getElementById('img-logo');
                  output.src = evt.data.resizedUrl;
                  document.getElementById('img-logo').src = evt.data.resizedUrl;
                });
              }
            });
            $('#img-logo').css('display', 'block');
            $('#xoa-logo').css('display', 'block');
          })

          $('#xoa-logo').on('click', function () {
            console.log('da click [xoa-logo]')
            document.getElementById('img-logo').src = '';
            $('#img-logo').css('display', 'none');
            $('#xoa-logo').css('display', 'none');
          })
        </script>
      </div>
    </div>
  </form>
</div>
<div class="col-md-6">
  <form class="form-horizontal">
    <div class="form-group">
      <div class="col-md-12">
        <div class="input-group">
          <div class="input-group-addon">Email liên hệ</div>
          <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $caiDatNgonNgu->getOriginal('email') }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Facebook</div>
          <input type="text" class="form-control" id="facebook" placeholder="Facebook" value="{{ $caiDatNgonNgu->facebook }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Instagram</div>
          <input type="text" class="form-control" id="instagram" placeholder="Instagram" value="{{ $caiDatNgonNgu->instagram }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Twitter</div>
          <input type="text" class="form-control" id="twitter" placeholder="Twitter" value="{{ $caiDatNgonNgu->twitter }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Youtube</div>
          <input type="text" class="form-control" id="youtube" placeholder="Youtube" value="{{ $caiDatNgonNgu->youtube }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Googe Plus</div>
          <input type="text" class="form-control" id="google_plus" placeholder="Googe Plus" value="{{ $caiDatNgonNgu->google_plus }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Vimeo</div>
          <input type="text" class="form-control" id="vimeo" placeholder="Vimeo" value="{{ $caiDatNgonNgu->vimeo }}">
        </div>
        <div class="input-group">
          <div class="input-group-addon">Weibo</div>
          <input type="text" class="form-control" id="weibo" placeholder="Weibo" value="{{ $caiDatNgonNgu->weibo }}">
        </div>
      </div>
    </div>
  </form>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <button id="btnCancel" class="btn btn-default pull-right">Huỷ</button>
  </div>
  <div class="col-md-6">
    <button id="btnChange" class="btn btn-primary pull-left">Lưu</button>
  </div>
</div>
