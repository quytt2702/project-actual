<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Colorlib App - App Landing Page</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="/lands/ca/style.css" rel="stylesheet">
    <link href="/lands/ca/css/responsive.css" rel="stylesheet">
    <link href="/lands/ca/css/font-awesome.min.css" rel="stylesheet">
    <link href="/lands/ca/css/flipclock.css" rel="stylesheet">
    <link href="/lands/ca/libs/slick/slick.css" rel="stylesheet">
    <link href="/lands/ca/libs/slick/slick-theme.css" rel="stylesheet">
    <link href="/lands/ca/css/custom.css" rel="stylesheet">

    <script src="/lands/ca/js/jquery-2.2.4.min.js"></script>
    <script src="/lands/ca/js/flipclock.min.js"></script>
    <script type="/lands/ca/libs/slick/slick.min.js"></script>
    <link rel="stylesheet" href="{{ mix('bundled/app.css') }}">
  </head>
  <body>
    <div id="preloader">
      <div class="colorlib-load"></div>
    </div>
    @include('lands.ca.partials.hotline')

    @include('lands.ca.components.header')

    @include('lands.ca.components.section_11')

    @include('lands.ca.components.footer')

    <!-- Popper js -->
    <script src="/lands/ca/js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="/lands/ca/js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="/lands/ca/js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="/lands/ca/js/slick.min.js"></script>
    <!-- Active JS -->
    <script src="/lands/ca/js/active.js"></script>
    <script src="{{ mix('bundled/app.js') }}"></script>
  </body>

</html>
