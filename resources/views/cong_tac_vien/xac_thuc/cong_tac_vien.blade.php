<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Xác thực người dùng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/animate.css" rel="stylesheet">
  <link href="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <link href="/template/plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet">
  <link href="/template/css/animate.css" rel="stylesheet">
  <link href="/template/css/style.css" rel="stylesheet">
  <link href="/template/css/colors/megna-dark.css" id="theme" rel="stylesheet">
</head>
<body style="margin:0px; background: #f8f8f8;">
  <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0; margin: 0px auto; font-size: 14px">
      <div style="background-color: #fff; padding: 20px 40px; border-radius: 7px ">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
          <tbody>
            <tr>
              <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="javascript:void(0)" target="_blank"><img src="/template/plugins/images/admin-logo-dark.png" alt="Admin Responsive web app kit" style="border:none"><br/>
                <img src="/template/plugins/images/admin-text-dark.png" alt="admin Responsive web app kit" style="border:none"></a> </td>
              </tr>
            </tbody>
          </table>
          @if ($errors->any())
          <div style="padding: 40px 40px 20px 40px; background: #fff;">
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td>
                  <b style="color: #c0392b; font-size: 20px;">Bạn chưa xác thực thông tin tài khoản</b>
                  <br /><br />
                  @php
                  $li_do = Auth::guard('cong_tac_vien')->user()->li_do_khong_duyet;
                  @endphp
                  @if (!empty($li_do))
                  <p>Lí do admin chưa duyệt: <span class="text-danger">"{{ $li_do }}"</span></p>
                  @endif
                  <form id="form" action="{{ route('cong_tac_vien.xac_thuc.xac_thuc') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-md-12">Email</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email" value="{{ Auth::guard('cong_tac_vien')->user()->email }}" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-12">Ngày sinh</label>
                          <div class="col-md-12">
                            <input type="date" class="form-control" placeholder="Ngày sinh" value="{{ old('ngay_sinh') }}" name="ngay_sinh">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Tỉnh thành</label>
                          <div class="col-md-12">
                            <select name="tinh_thanh" class="form-control">
                              @foreach ($tinhThanh as $item)
                              <option>{{ $item->ten_tinh_thanh }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Địa chỉ giao hàng</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Địa chỉ giao hàng" id="dia_chi_hien_tai" value="{{ old('dia_chi_hien_tai') }}" name="dia_chi_hien_tai" onFocus="geolocate()">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Số tài khoản</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ old('so_tai_khoan') }}" placeholder="Số tài khoản" name="so_tai_khoan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Số điện thoại</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ Auth::guard('cong_tac_vien')->user()->so_dien_thoai }}" placeholder="Số tài khoản" name="so_dien_thoai">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Giới tính</label>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-4">
                                <label class="radio-inline">
                                  <input type="radio" name="gioi_tinh" value="NAM" checked>Nam
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label class="radio-inline">
                                  <input type="radio" name="gioi_tinh" value="NỮ">Nữ
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12" style="margin-top: 3px;">CMND (Mặt trước)</label>
                          <div class="col-md-12" style="padding: 5px 15px;">
                            <input type="file" id="img_01" name="img_01" value="{{ old('img_01') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12" style="margin-top: 3px;">Hình đại diện</label>
                          <div class="col-md-12" style="padding: 5px 15px;">
                            <input type="file" id="img_avatar" name="img_avatar" value="{{ old('img_avatar') }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-12">CMND</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ old('cmnd') }}" placeholder="CMND" name="cmnd">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Facebook</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ old('facebook') }}" placeholder="Facebook" name="facebook">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Ngân hàng</label>
                          <div class="col-md-12">
                            <select name="id_ngan_hang" class="form-control">
                              @foreach($nganHang as $item)
                              <option value="{{ $item->id }}">{{ $item->ten_ngan_hang }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Địa chỉ CMND</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Địa chỉ CMND" value="{{ old('dia_chi_cmnd') }}" name="dia_chi_cmnd" id="dia_chi_cmnd">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Tên chủ tài khoản</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Tên chủ tài khoản" value="{{ old('ten_chu_tai_khoan') }}" name="ten_chu_tai_khoan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">Tên chi nhánh</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Tên chi nhánh" value="{{ old('ten_chi_nhanh') }}" name="ten_chi_nhanh">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12">CMND (Mặt sau)</label>
                          <div class="col-md-12" style="padding: 5px 15px;">
                            <input type="file" id="img_02" name="img_02" value="{{ old('img_02') }}">
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
  </div>
</div>
</body>
<script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/template/js/jquery.slimscroll.js"></script>
<script src="/template/js/waves.js"></script>
<script src="/template/js/custom.min.js"></script>
<script src="/template/js/jasny-bootstrap.js"></script>
<script src="/template/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrO8oxoyxjqYqVzEno1ANWdC6OtuLG96E&libraries=places&callback=initAutocomplete" async defer></script>
<script>
  $(document).ready(function () {
    var img_01 = $('#img_01').dropify();
    img_01.on('dropify.beforeClear', function (event, element) {
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    img_01.on('dropify.afterClear', function (event, element) {
      alert('File deleted');
    });
    img_01.on('dropify.errors', function (event, element) {
      console.log('Has Errors');
    });

    var img_02 = $('#img_02').dropify();
    img_02.on('dropify.beforeClear', function (event, element) {
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    img_02.on('dropify.afterClear', function (event, element) {
      alert('File deleted');
    });
    img_02.on('dropify.errors', function (event, element) {
      console.log('Has Errors');
    });

    var img_avatar = $('#img_avatar').dropify();
    img_avatar.on('dropify.beforeClear', function (event, element) {
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    img_avatar.on('dropify.afterClear', function (event, element) {
      alert('File deleted');
    });
    img_avatar.on('dropify.errors', function (event, element) {
      console.log('Has Errors');
    });

  });
</script>
<script>
 var placeSearch, dia_chi_hien_tai, dia_chi_cmnd;

 function initAutocomplete() {
  dia_chi_hien_tai = new google.maps.places.Autocomplete((document.getElementById('dia_chi_hien_tai')),{types: ['geocode']});
  dia_chi_cmnd = new google.maps.places.Autocomplete((document.getElementById('dia_chi_cmnd')),{types: ['geocode']});
}

function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      dia_chi_hien_tai.setBounds(circle.getBounds());
      dia_chi_cmnd.setBounds(circle.getBounds());
    });
  }
}
</script>
<script>
  // $('#form').on('submit', function (e) {
    // e.preventDefault();
    // alert('asd');
    // ... $('#form').submit();
  // });
</script>

</html>

