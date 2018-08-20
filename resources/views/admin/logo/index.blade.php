@extends('admin.layouts.master')
@section('master.title', 'Quản lý logo Lavion')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        Quản lý logo Lavion
      </h3>
      <div class="m-t-20 table-responsive">
        <form id="form" action="{{ route('admin.logo.store') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-12">Upload hình</label>
            <div class="col-md-12" style="padding: 5px 15px;">
              <input type="file" id="logo" name="logo" data-default-file="{{ $caiDat->logo }}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Thay đổi</button>
              <button class="btn btn-default">Trở về</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    var logo = $('#logo').dropify();
    logo.on('dropify.beforeClear', function (event, element) {
      return confirm("Bạn có muốn xoá  \"" + element.file.name + "\" ?");
    });
    logo.on('dropify.afterClear', function (event, element) {
      window.toastr.error('Đã xoá');
    });
    logo.on('dropify.errors', function (event, element) {
      console.log('Đã có lỗi');
    });
  });
</script>
@endsection
