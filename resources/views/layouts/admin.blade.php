<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/template/plugins/images/favicon.png') }}">
  <title>@yield('master.title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <!-- Custom CSS -->
  <link href="/template/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="/template/css/colors/megna-dark.css" id="theme" rel="stylesheet">

  <link rel="stylesheet" href="{{ mix('bundled/app.css') }}">


  <script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
  <!--slimscroll JavaScript -->
  <script src="/template/js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="/template/js/waves.js"></script>
  <!--Counter js -->
  <script src="/template/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
  <script src="/template/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
  <!--Morris JavaScript -->
  <script src="/template/plugins/bower_components/raphael/raphael-min.js"></script>
  <script src="/template/plugins/bower_components/morrisjs/morris.js"></script>
  <!-- chartist chart -->
  <script src="/template/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
  <script src="/template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
  <!-- Calendar JavaScript -->
  <script src="/template/plugins/bower_components/moment/moment.js"></script>
  <script src='template/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
  <script src="/template/plugins/bower_components/calendar/dist/cal-init.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="/template/js/custom.min.js"></script>
  {{-- <script src="/template/js/dashboard1.js"></script> --}}
  <!-- Custom tab JavaScript -->
  <script src="/template/js/cbpFWTabs.js"></script>

  <script src="/template/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
  <!--Style Switcher -->
  <script src="/template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
  {{-- General --}}
  {{-- <script src="/js/general.js"></script> --}}

  <script src="{{ mix('bundled/all.js') }}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ mix('bundled/app.js') }}"></script>

</head>
<body class="fix-header">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>
  <div id="wrapper">
    @include('admin.layouts.partials.navbar-header')
    @include('admin.layouts.partials.sidebar')
    <div id="page-wrapper">
      <div class="container-fluid">
        @yield('master.content')
      </div>
      <footer class="footer text-center"> 2018 &copy; MSM System </footer>
    </div>
  </div>
  {{-- @include('admin.layouts.partials.footer') --}}
  @yield('master.js')
</body>
</html>
