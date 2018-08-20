<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="/template/plugins/images/favicon.png">
  <title>Thông báo</title>
  <link href="/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/animate.css" rel="stylesheet">
  <link href="/template/css/style.css" rel="stylesheet">
  <link href="/template/css/colors/default.css" id="theme"  rel="stylesheet">
  <style>
    @media (max-width: 580px) {
      .onlyOne {
        line-height: 1;
      }
    }
  </style>
</head>
<body>
  <section id="wrapper" class="error-page">
    <div class="error-box">
      <div class="error-body text-center">
        {{-- <h1 class="text-danger">404</h1> --}}
        <h3 class="text-uppercase font-bold onlyOne" style="font-size: 100px;">{{ $title }}</h3>
        <p class="text-muted m-b-30" style="margin-top: 70px; font-size: 50px;">{{ $message }}</p>
        <a href="{{ $link }}" class="btn btn-danger btn-lg waves-effect waves-light m-b-40">Trở về</a>
      </div>
      {{-- <footer class="footer text-center">2018 © {{ config('app.url') }}.</footer> --}}
    </div>
  </section>
  <script src="/template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
