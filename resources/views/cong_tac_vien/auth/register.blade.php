<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="/template/plugins/images/favicon.png">
  <title>Đăng ký - Cộng tác viên</title>
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/animate.css" rel="stylesheet">
  <link href="/template/css/style.css" rel="stylesheet">
  <link href="/template/css/colors/blue.css" id="theme"  rel="stylesheet">
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
      <div class="white-box">
        <form class="form-horizontal form-material" id="loginform" action="{{ route('cong_tac_vien.auth.store') }}" method="POST">
          {{ csrf_field() }}
        <div class="text-center db">
          @if(empty($caiDatNgonNgu->logo_web))
            <a href="javascript:void(0)"><img src="/template/plugins/images/admin-logo-dark.png" alt="Home" /><br/><img src="/template/plugins/images/admin-text-dark.png" alt="Home" /></a>
          @else
            <div style="overflow: hidden; max-width: 140px; max-height: 120px; margin:auto;">
              <img style="object-fit: cover; width: 100%; height: 100%;" src="{{ $caiDatNgonNgu->logo_web }}" alt="Home">
            </div>
          @endif
        </div>
          <h3 class="box-title m-t-40 m-b-0">Đăng ký</h3><small>Đăng kí cộng tác viên</small>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="help-block">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </div>
                @endif
              </div>
              <input name="email" class="form-control" type="text" required="" placeholder="Email" value="{{ old('email') }}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="ho_va_ten" class="form-control" type="text" required="" placeholder="Họ và tên" value="{{ old('ho_va_ten') }}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="so_dien_thoai" class="form-control" type="text" required="" placeholder="Số điện thoại" value="{{ old('so_dien_thoai') }}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="password" class="form-control" type="password" required="" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="password_confirmation" class="form-control" type="password" required="" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <div class="checkbox checkbox-primary p-t-0">
                <input name="agree_terms" type="checkbox">
                <label for="checkbox-signup"> Tôi đồng ý các <a href="#">điều khoản</a></label>
              </div>
            </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Đăng ký</button>
            </div>
          </div>
          <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
              <p>Đã có tài khoản? <a href="{{ route('cong_tac_vien.auth.login') }}" class="text-primary m-l-5"><b>Đăng nhập</b></a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
  <script src="/template/js/jquery.slimscroll.js"></script>
  <script src="/template/js/waves.js"></script>
  <script src="/template/js/custom.min.js"></script>
  <script src="/template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
