<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/png" sizes="16x16" href="/template/plugins/images/favicon.png">
<title>Login - Admin</title>
<!-- Bootstrap Core CSS -->
<link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="/template/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="/template/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="/template/css/colors/default.css" id="theme"  rel="stylesheet">
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
<section id="wrapper" class="new-login-register">
  <div class="lg-info-panel">
    <div class="inner-panel">
      <a href="javascript:void(0)" class="p-20 di"><img src="/template/plugins/images/admin-logo.png"></a>
      <div class="lg-content">
        <h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
        <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p>
        {{-- <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> --}}
      </div>
    </div>
  </div>
  <div class="new-login-box">
    <div class="white-box">
      <h3 class="box-title m-b-0">Sign In to Admin</h3>
      <small>Enter your details below</small>
      <form class="form-horizontal new-lg-form" action="{{ route('admin.auth.login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group  m-t-20">
          <div class="col-xs-12">
            <div class="help-block">
              @if ($errors->any())
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $errors->first() }}
              </div>
              @endif
            </div>
            <label>Email Address</label>
            <input name="email" class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label>Password</label>
            <input name="password" class="form-control" type="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-info pull-left p-t-0">
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a> </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            </div>
          </div>
          <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
              <p>Don't have an account? <a href="register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
            </div>
          </div>
        </form>
    {{--     <div class="form-horizontal">
          <div class="form-group ">
            <div class="col-xs-12">
              <h3>Recover Password</h3>
              <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control" type="text" required="" placeholder="Email">
            </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
            </div>
          </div>
        </div> --}}
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
{{-- <script>
  $('#btnLogin').on('click', function() {
    $.ajax({
      method: 'POST',
      url: '/admin/login',
      data: {
        '_token': "{{ csrf_token() }}",
        email: $('#email').val(),
        password: $('#password').val()
      }
    }).done(function (data) {
      console.log(data);
    }).fail(function (error) {
      displayErrors(error);
    });
  });

</script> --}}
