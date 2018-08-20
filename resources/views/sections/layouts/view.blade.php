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
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/responsive.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/product_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/product_responsive.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/shop_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/shop_responsive.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/cart_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/cart_responsive.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/blog_single_styles.css">
  <link rel="stylesheet" type="text/css" href="/one_tech_template/styles/blog_single_responsive.css">
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/ecommerce.css') }}">

  <link rel="stylesheet" href="/template/toastr.css">
  <script src="/one_tech_template/js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
  <style type="text/css" media="screen">
    body {
      font-family: 'Roboto', sans-serif !important;
    }
  </style>
</head>
<body>
  <div class="super_container">
    {{-- @include('sections.layouts.partials.header') --}}
    <!-- Header -->
    <header class="header">
      <!-- Top Bar -->
      <div class="top_bar">
        <div class="container">
          <div class="row">
            <div class="col d-flex flex-row">
              <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/one_tech_template/images/phone.png" alt=""></div><a href="tel:{{ $caiDatNgonNgu->sdt }}">{{ $caiDatNgonNgu->sdt }}</a></div>
              <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/one_tech_template/images/mail.png" alt=""></div><a href="mailto:{{ $caiDatNgonNgu->email }}">{{ $caiDatNgonNgu->email }}</a></div>
              <div class="top_bar_content ml-auto">
                <div class="top_bar_menu">
                  <ul class="standard_dropdown top_bar_dropdown">
                    <li>
                      <a href="/">Tiếng Việt<i class="fas fa-chevron-down"></i></a>
                      <ul>
                        @foreach($ngonNgu as $item)
                        <li><a href="{{ $item->link_web }}">{{ $item->ten }}</a></li>
                        @endforeach
                      </ul>
                    </li>
{{--                     <li>
                      <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                      <ul>
                        <li><a href="#">EUR Euro</a></li>
                        <li><a href="#">GBP British Pound</a></li>
                        <li><a href="#">JPY Japanese Yen</a></li>
                      </ul>
                    </li> --}}
                  </ul>
                </div>
                <div class="top_bar_user">
                  <div class="user_icon"><img src="/one_tech_template/images/user.svg" alt=""></div>
                  <div><a href="{{ route('cong_tac_vien.auth.register') }}">Đăng ký</a></div>
                  <div><a href="{{ route('cong_tac_vien.auth.login') }}">Đăng nhập</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Main -->
      <div class="header_main">
        <div class="container">
          <div class="row">
            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
              <div class="logo_container">
                @if($caiDatNgonNgu->loai_tieu_de_web === 'CHU')
                  <div class="logo"><a href="/">{{ $caiDatNgonNgu->tieu_de_trang_web }}</a></div>
                @else
                    <div class="logo" style="overflow: hidden; max-width: 140px; max-height: 120px">
                      <img style="object-fit: cover; width: 100%; height: 100%;" src="{{ empty($caiDatNgonNgu->logo_web) ? '/template/plugins/images/admin-text-dark.png' : $caiDatNgonNgu->logo_web }}" alt="Home">
                    </div>
                @endif
              </div>
            </div>
            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
              <div class="header_search">
                <div class="header_search_content">
                  <div class="header_search_form_container">
                    <form action="#" class="header_search_form clearfix">
                      <input type="search" required="required" class="header_search_input" placeholder="Tìm kiếm...">

                      <button type="submit" class="header_search_button trans_300" value="Submit"><img src="/one_tech_template/images/search.png" alt=""></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
              <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
{{--                 <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                  <div class="wishlist_icon"><img src="/one_tech_template/images/heart.png" alt=""></div>
                  <div class="wishlist_content">
                    <div class="wishlist_text"><a href="#">Wishlist</a></div>
                    <div class="wishlist_count">115</div>
                  </div>
                </div>
                --}}
                <!-- Cart -->
                <div class="cart">
                  <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                    <div class="cart_icon">
                      <a href="/gio-hang"><img src="/one_tech_template/images/cart.png" alt="">
                      <div class="cart_count"><span>{{ $listSanPhamCookie['soLuong'] }}</span></div>
                      </a>
                    </div>
                    <div class="cart_content">
                      <div class="cart_text"><a href="/gio-hang">Giỏ hàng</a></div>
                      <div class="cart_price"><a href="/gio-hang" style="color:#a3a3a3;">{{ number_format($listSanPhamCookie['tongTien']) }} VND</div></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Navigation -->
      <nav class="main_nav">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main_nav_content d-flex flex-row">
                <!-- Categories Menu -->
                {!! $menu_doc !!}

                <!-- Main Nav Menu -->
                {!! $menu_ngang !!}

                <!-- Menu Trigger -->
                <div class="menu_trigger_container ml-auto">
                  <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                    <div class="menu_burger">
                      <div class="menu_trigger_text">menu</div>
                      <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>

      <!-- Menu -->
      {!! $menu_ngang_mobile !!}

    </header>

    {{--  --}}

    <div class="@yield('master.bodyclass')" style="min-height: 100vh;">
      {!! $html !!}
    </div>

    <!-- Footer -->
    <footer class="footer">
      {!! $footer !!}
    </footer>

    <!-- Copyright -->
    <div class="copyright" style="display: none;">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
              <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Make <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">MSM Team</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </div>
{{--               <div class="logos ml-sm-auto">
                <ul class="logos_list">
                  <li><a href="#"><img src="/one_tech_template/images/logos_1.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_2.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_3.png" alt=""></a></li>
                  <li><a href="#"><img src="/one_tech_template/images/logos_4.png" alt=""></a></li>
                </ul>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('sections.layouts.partials.footer')
</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5b7581d7afc2c34e96e7a203/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->
</html>
