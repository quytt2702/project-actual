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
  <title>@yield('master.title')</title>

  <meta name="base-url" content="{{ url('/') }}">
  <!-- Bootstrap Core CSS -->
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- toast CSS -->
  <link href="/template/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- morris CSS -->
  <link href="/template/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
  <!-- chartist CSS -->
  <link href="/template/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="/template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <!-- Calendar CSS -->
  <link href="/template/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
  <!-- animation CSS -->
  <link href="/template/css/animate.css" rel="stylesheet">
  <!-- Color picker plugins css -->
  <link href="/template/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
  <link rel="stylesheet" href="/template/toastr.css">
  <!-- Switchery -->
  <link href="/template/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
  <!-- X-editable css -->
  <link href="/template/plugins/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
  <!-- Wysihtml5 -->
  <link rel="stylesheet" href="/template/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
  <!-- Alerts CSS -->
  <link href="/template/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
  <link href="/template/plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css">
  <!-- Popup CSS -->
  <link href="/template/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
  <!-- Clock Picker -->
  <link href="/template/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
  <!-- Date picker plugins css -->
  <link href="/template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="/template/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
  <link href="/template/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="/template/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="/template/css/colors/megna-dark.css" id="theme" rel="stylesheet">
  <!-- Bundled CSS -->
  <link rel="stylesheet" href="{{ mix('bundled/app.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body class="fix-header @yield('master.bodyclass')">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        @include('cong_tac_vien.layouts.partials.navbar-header')
        @include('cong_tac_vien.layouts.partials.sidebar')
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('master.content')
            </div>
            <footer class="footer text-center"> 2018 &copy; MSM System </footer>
        </div>
    </div>
    <script src="{{ mix('bundled/app.js') }}"></script>
    @include('cong_tac_vien.layouts.partials.footer')
    @yield('master.js')
</body>
</html>
