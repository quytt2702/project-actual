<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('master.title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ config('app.name') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/bootstrap4/bootstrap.min.css">
  <link href="/one_tech_template/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/plugins/slick-1.8.0/slick.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/responsive.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
  <style type="text/css" media="screen">
  * {
    font-family: 'Roboto', sans-serif;
  }
</style>
</head>
<body>
  <div class="super_container">
    @include('sections.layouts.partials.header')

    <div class="@yield('master.bodyclass')">
      @yield('master.content')
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 footer_col">
            <div class="footer_column footer_contact">
              <div class="logo_container">
                <div class="logo"><a href="#">OneTech</a></div>
              </div>
              <div class="footer_title">Got Question? Call Us 24/7</div>
              <div class="footer_phone">+38 068 005 3570</div>
              <div class="footer_contact_text">
                <p>17 Princess Road, London</p>
                <p>Grester London NW18JR, UK</p>
              </div>
              <div class="footer_social">
                <ul>
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fab fa-google"></i></a></li>
                  <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-2 offset-lg-2">
            <div class="footer_column">
              <div class="footer_title">Find it Fast</div>
              <ul class="footer_list">
                <li><a href="#">Computers &amp; Laptops</a></li>
                <li><a href="#">Cameras &amp; Photos</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Smartphones &amp; Tablets</a></li>
                <li><a href="#">TV &amp; Audio</a></li>
              </ul>
              <div class="footer_subtitle">Gadgets</div>
              <ul class="footer_list">
                <li><a href="#">Car Electronics</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-2">
            <div class="footer_column">
              <ul class="footer_list footer_list_2">
                <li><a href="#">Video Games &amp; Consoles</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Cameras &amp; Photos</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Computers &amp; Laptops</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-2">
            <div class="footer_column">
              <div class="footer_title">Customer Care</div>
              <ul class="footer_list">
                <li><a href="#">My Account</a></li>
                <li><a href="#">Order Tracking</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="#">Customer Services</a></li>
                <li><a href="#">Returns / Exchange</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Product Support</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
              <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </div>
              <div class="logos ml-sm-auto">
                <ul class="logos_list">
                  <li><a href="#"><img src="/one_tech_template/images/logos_1.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_2.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_3.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_4.png" alt=""></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('sections.layouts.partials.footer')
</body>

</html>
