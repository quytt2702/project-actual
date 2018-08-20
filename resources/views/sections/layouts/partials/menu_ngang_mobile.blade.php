<div class="page_menu">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="page_menu_content">
{{--           <div class="page_menu_search">
            <form action="#">
              <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
            </form>
          </div> --}}
          <ul class="page_menu_nav">
            <li class="page_menu_item"><a href="{{ route('cong_tac_vien.auth.login') }}">Đăng nhập<i class="fas fa-chevron-down"></i></a></li>
            <li class="page_menu_item"><a href="{{ route('cong_tac_vien.auth.register') }}">Đăng ký<i class="fas fa-chevron-down"></i></a></li>
            <li class="page_menu_item has-children">
              <a href="#">Ngôn ngữ<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="/">Tiếng Việt<i class="fa fa-angle-down"></i></a></li>
                @foreach($ngonNgu as $item)
                  <li><a href="{{ $item->link_web }}">{{ $item->ten }}<i class="fa fa-angle-down"></i></a></li>
                @endforeach
{{--                 <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li> --}}
              </ul>
            </li>

{{--             <li>
              <a href="/">Tiếng Việt<i class="fas fa-chevron-down"></i></a>
              <ul>
                @foreach($ngonNgu as $item)
                <li><a href="{{ $item->link_web }}">{{ $item->ten }}</a></li>
                @endforeach
              </ul>
            </li> --}}


            @foreach($menuNgang as $item)
            @if (!empty($item->children))
            <li class="page_menu_item has-children">
              <a href="{{ $item->href }}">{{ $item->text }}<i class="fas fa-chevron-down"></i></a>
              <ul class="page_menu_selection">
                @foreach($item->children as $sub_item)
                <li>
                  <a href="{{ $sub_item->href }}">{{ $sub_item->text }}<i class="fas fa-chevron-down"></i></a>
                </li>
                @endforeach
              </ul>
            </li>
            @else
            <li class="page_menu_item"><a href="{{ $item->href }}">{{ $item->text }}<i class="fas fa-chevron-down"></i></a></li>
            @endif
            @endforeach
{{--
            <li class="page_menu_item has-children">
              <a href="#">Currency<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item">
              <a href="#">Home<i class="fa fa-angle-down"></i></a>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item has-children">
                  <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item has-children">
              <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
              <ul class="page_menu_selection">
                <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
              </ul>
            </li>
            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
            <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
          </ul> --}}

          <div class="menu_contact">
            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/one_tech_template/images/phone_white.png" alt=""></div><a href="tel:{{ $caiDatNgonNgu->sdt }}">{{ $caiDatNgonNgu->sdt }}</a></div>
            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/one_tech_template/images/mail_white.png" alt=""></div><a href="mailto:{{ $caiDatNgonNgu->email }}">{{ $caiDatNgonNgu->email }}</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
