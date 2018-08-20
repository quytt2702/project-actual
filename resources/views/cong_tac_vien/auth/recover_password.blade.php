<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="/template/plugins/images/favicon.png">
  <title>Lấy lại mật khẩu - Cộng tác viên</title>
  <!-- Bootstrap Core CSS -->
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="/template/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/template/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="/template/css/colors/blue.css" id="theme"  rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
      <div class="white-box">
        <form class="form-horizontal form-material" id="loginform" action="{{ route('cong_tac_vien.auth.recover') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="txid" value="{{ $token }}">
          <a href="javascript:void(0)" class="text-center db"><img src="/template/plugins/images/admin-logo-dark.png" alt="Home" /><br/><img src="/template/plugins/images/admin-text-dark.png" alt="Home" /></a>

          <div class="form-group m-t-40">
            <div class="col-xs-12">
              <input name="password" class="form-control" type="password" required="" placeholder="Enter the new password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="password-confirmation" class="form-control" type="password" required="" placeholder="Re-type Password">
            </div>
          </div>
          <div class="form-group">
            <div class="form-group text-center m-t-20">
              <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Recover Password</button>
              </div>
            </div>

            <div class="form-group m-b-0">
              <div class="col-sm-12 text-center">
                <p>Don't have an account? <a href="{{ route('cong_tac_vien.auth.register') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                <p>Login <a href="{{ route('cong_tac_vien.auth.login') }}" class="text-primary"><b>here</b></a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
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
    <!--Style Switcher -->
    <script src="/template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
  </body>
  </html>
