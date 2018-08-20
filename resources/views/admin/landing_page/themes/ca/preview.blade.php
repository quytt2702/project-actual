<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $theme->title }}</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="/lands/ca/style.css" rel="stylesheet">
    <link href="/lands/ca/css/responsive.css" rel="stylesheet">
    <link href="/lands/ca/css/flipclock.css" rel="stylesheet">
    <link href="/lands/ca/css/slick.css" rel="stylesheet">
    <link href="/lands/ca/css/slick-theme.css" rel="stylesheet">
    <link href="/lands/ca/css/custom.css" rel="stylesheet">

    <script src="/lands/ca/js/jquery-2.2.4.min.js"></script>
    <script src="/lands/ca/js/flipclock.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/bundled/app.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div id="preloader">
      <div class="colorlib-load"></div>
    </div>

    @include('lands.ca.partials.hotline', compact('theme'))

    @include('lands.ca.components.header', ['sections' => $theme->sections])

    @foreach ($theme->sections as $section)
        @include("lands.ca.components.{$section->code}", compact('section'))
    @endforeach

    @include('lands.ca.components.footer', ['footer' => $theme->footer])

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

    @if (!empty($theme->script_js))
      {!! $theme->script_js !!}
    @endif
  </body>
</html>
