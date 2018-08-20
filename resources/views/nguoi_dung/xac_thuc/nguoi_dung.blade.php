<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Xác thực người dùng</title>
  <!-- Bootstrap Core CSS -->
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="/template/css/animate.css" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/template/plugins/bower_components/dropify/dist/css/dropify.min.css">
  <!-- animation CSS -->
  <link href="/template/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/template/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="/template/css/colors/megna-dark.css" id="theme" rel="stylesheet">
</head>
<body style="margin:0px; background: #f8f8f8; ">
  <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
        <tbody>
          <tr>
            <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="javascript:void(0)" target="_blank"><img src="/template/plugins/images/admin-logo-dark.png" alt="Admin Responsive web app kit" style="border:none"><br/>
              <img src="/template/plugins/images/admin-text-dark.png" alt="admin Responsive web app kit" style="border:none"></a> </td>
            </tr>
          </tbody>
        </table>
{{--         <div style="padding: 40px 40px 20px 40px; background: #fff;">
           <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
            </ul>
          </div>  --}}
          @php
          $alert = session()->get('alert');
          @endphp
          @if (!empty($alert))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info fa-fw"></i>{{ $alert['title'] }}</h4>
            {{ $alert['message'] }}
          </div>
          @php
            session()->forget('alert');
          @endphp
          @endif


            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
              <tbody>
                <tr>
                  <td>
                    <b style="color: #c0392b; font-size: 20px;">Bạn chưa xác thực thông tin tài khoản</b>
                    <br /><br />
                    <form id="form" action="/xac-thuc/nguoi-dung" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12">Họ và tên</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Họ và tên" value="{{ old('ten') }}" name="ten">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">Ngày sinh</label>
                            <div class="col-md-12">
                              <input type="date" class="form-control" placeholder="Ngày sinh" value="{{ old('ngay_sinh') }}" name="ngay_sinh">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">Giới tính</label>
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-4">
                                  <label class="radio-inline">
                                    <input type="radio" name="gioi_tinh" value="nam">Nam
                                  </label>
                                </div>
                                <div class="col-md-4">
                                  <label class="radio-inline">
                                    <input type="radio" name="gioi_tinh" value="nu">Nữ
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12" style="margin-top: 3px;">CMND (Mặt trước)</label>
                            <div class="col-md-12" style="padding: 5px 15px;">
                              <input type="file" id="image_01" name="image_01" value="{{ old('image_01') }}">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-12">Ngân hàng</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Ngân hàng" value="{{ old('ngan_hang') }}" name="ngan_hang">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">Số tài khoản</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Số tài khoản" value="{{ old('so_tai_khoan') }}" name="so_tai_khoan">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">Số CMND</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Số CMND" value="{{ old('cmnd') }}" name="cmnd">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">CMND (Mặt sau)</label>
                            <div class="col-md-12" style="padding: 5px 15px;">
                              <input type="file" id="image_02" name="image_02" value="{{ old('image_02') }}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary pull-right" style="margin-top: 20px;" type="submit" onSubmit="return confirm('Are you sure you wish to delete?');">Xác thực</button>
                    </form>
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery -->
  <script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
  <!--slimscroll JavaScript -->
  <script src="/template/js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="/template/js/waves.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="/template/js/custom.min.js"></script>
  <script src="/template/js/jasny-bootstrap.js"></script>
  <!-- jQuery file upload -->
  <script src="/template/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
  <script>
    $(document).ready(function () {
      // Used events
      // $('.dropify').dropify();
      var image_01 = $('#image_01').dropify();
      image_01.on('dropify.beforeClear', function (event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
      });
      image_01.on('dropify.afterClear', function (event, element) {
        alert('File deleted');
      });
      image_01.on('dropify.errors', function (event, element) {
        console.log('Has Errors');
      });

      var image_02 = $('#image_02').dropify();
      image_02.on('dropify.beforeClear', function (event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
      });
      image_02.on('dropify.afterClear', function (event, element) {
        alert('File deleted');
      });
      image_02.on('dropify.errors', function (event, element) {
        console.log('Has Errors');
      });

    });
  </script>
  </html>

  <script>
    $('#form').on('submit', function (e) {
      // e.preventDefault();
      // alert('asd');
      // ... $('#form').submit();
    });
  </script>
