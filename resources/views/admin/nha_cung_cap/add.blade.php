@extends('admin.layouts.master')
@section('master.bodyclass', 'nha-cung-cap')
@section('master.title', 'Thêm nhà cung cấp')
@section('master.content')
<div class="row m-t-30">
  <div class="col-sm-9">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm nhà cung cấp</h3>
      <br>
      <div class="form-horizontal">
        <div class="col-md-6 p-l-0">
          <div class="form-group">
            <label class="col-md-12">Tên nhà cung cấp</label>
            <div class="col-md-12">
              <input id="nha_cung_cap_ten" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6 p-r-0">
          <div class="form-group">
            <label class="col-md-12">Địa chỉ</label>
            <div class="col-md-12">
              <input id="nha_cung_cap_dia_chi" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6 p-l-0">
          <div class="form-group">
            <label class="col-md-12">Số điện thoại chính</label>
            <div class="col-md-12">
              <input id="nha_cung_cap_phone_01" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6 p-r-0">
          <div class="form-group">
            <label class="col-md-12">Số điện thoại phụ <i style="color: #7f8c8d;">(nếu có)</i></label>
            <div class="col-md-12">
              <input id="nha_cung_cap_phone_02" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-12">Thông tin thêm</label>
          <div class="col-md-12">
            <input id="nha_cung_cap_thong_tin_them" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-12">Trạng thái</label>
          <div class="col-md-12">
            <div class="checkbox checkbox-success">
              <input id="nha_cung_cap_is_active" type="checkbox">
              <label for="nha_cung_cap_is_active">Active</label>
            </div>
          </div>
        </div>
        <div class="input-group">
          <div class="image-nha-cung-cap">
            <img id="img-avatar" class="m-b-10" hidden>
            <a href="javascript:" id="xoa-avatar" hidden><i class="fa fa-close text-danger style"></i></a>
            <a id="ckfinder-avatar" class="btn btn-default btn-block">Chọn image nhà cung cấp</a>
          </div>
        </div>
        <script src="/cktemplate/ckfinder/ckfinder.js"></script>
        <script>
          $('#ckfinder-avatar').on('click', function () {
            console.log('da click [ckfinder-avatar]')
            CKFinder.modal({
              chooseFiles: true,
              width: 800,
              height: 600,
              onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                  var file = evt.data.files.first();
                  $('#img-avatar').attr('src', file.getUrl());
                });

                finder.on( 'file:choose:resizedImage', function( evt ) {
                  var output = document.getElementById('img-avatar');
                  output.src = evt.data.resizedUrl;
                  document.getElementById('img-avatar').src = evt.data.resizedUrl;
                });
              }
            });
            $('#img-avatar').css('display', 'block');
            $('#xoa-avatar').css('display', 'block');
          })

          $('#xoa-avatar').on('click', function () {
            console.log('da click [xoa-avatar]')
            document.getElementById('img-avatar').src = '';
            $('#img-avatar').css('display', 'none');
            $('#xoa-avatar').css('display', 'none');
          })
        </script>
        <div class="form-actions text-right">
          <button id="btnSubmit" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Thêm nhà cung cấp</button>
          <button type="button" class="btn btn-default">Hủy bỏ</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
