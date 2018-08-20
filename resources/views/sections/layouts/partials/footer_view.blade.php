<div class="container">
  <div class="row">
    <div class="col-lg-3 footer_col">
      <div class="footer_column footer_contact">
        <div class="logo_container">
          <div class="logo"><a href="{{ $caiDatNgonNgu->link_tieu_de_footer }}">{{ $caiDatNgonNgu->tieu_de_footer }}</a></div>
        </div>
        <div class="footer_title">{{ $caiDatNgonNgu->mo_ta_ngan_footer }}</div>
        <div class="footer_phone">{{ $caiDatNgonNgu->sdt_footer }}</div>
        <div class="footer_contact_text">
          <p>{{ $caiDatNgonNgu->dia_chi_footer }}</p>
          {{-- <p>Grester London NW18JR, UK</p> --}}
        </div>
        <div class="footer_social">
          <ul>
            @if(!empty($caiDatNgonNgu->facebook))
            <li><a href="{{ $caiDatNgonNgu->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->instagram))
            <li><a href="{{ $caiDatNgonNgu->instagram }}"><i class="fab fa-instagram"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->twitter))
            <li><a href="{{ $caiDatNgonNgu->instagram }}"><i class="fab fa-twitter"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->youtube))
            <li><a href="{{ $caiDatNgonNgu->youtube }}"><i class="fab fa-youtube"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->google_plus))
            <li><a href="{{ $caiDatNgonNgu->google_plus }}"><i class="fab fa-google"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->vimeo))
            <li><a href="{{ $caiDatNgonNgu->vimeo }}"><i class="fab fa-vimeo-v"></i></a></li>
            @endif

            @if(!empty($caiDatNgonNgu->weibo))
            <li><a href="{{ $caiDatNgonNgu->weibo }}"><i class="fab fa-weibo"></i></a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-2 offset-lg-2">
      <div class="footer_column">
        @if (!empty($caiDatNgonNgu->tieu_de_menu_01_footer))
        <div class="footer_title">{{ $caiDatNgonNgu->tieu_de_menu_01_footer }}</div>
        <ul class="footer_list">
          @else
          <ul class="footer_list footer_list_2">
            @endif
            @php
            $menu = json_decode($caiDatNgonNgu->noi_dung_menu_01_body);
            @endphp
            @if(!empty($menu))
            @foreach($menu as $item)
            <li><a href="{{ $item->url }}">{{ $item->ten_hien_thi }}</a></li>
            @endforeach
            @endif
          </ul>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="footer_column">
          @if (!empty($caiDatNgonNgu->tieu_de_menu_02_footer))
          <div class="footer_title">{{ $caiDatNgonNgu->tieu_de_menu_02_footer }}</div>
          <ul class="footer_list">
            @else
            <ul class="footer_list footer_list_2">
              @endif
              @php
              $menu = json_decode($caiDatNgonNgu->noi_dung_menu_02_body);
              @endphp
              @if(!empty($menu))
              @foreach($menu as $item)
              <li><a href="{{ $item->url }}">{{ $item->ten_hien_thi }}</a></li>
              @endforeach
              @endif
            </ul>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="footer_column">
            @if (!empty($caiDatNgonNgu->tieu_de_menu_03_footer))
            <div class="footer_title">{{ $caiDatNgonNgu->tieu_de_menu_03_footer }}</div>
            <ul class="footer_list">
              @else
              <ul class="footer_list footer_list_2">
                @endif
                @php
                $menu = json_decode($caiDatNgonNgu->noi_dung_menu_03_body);
                @endphp
                @if(!empty($menu))
                @foreach($menu as $item)
                <li><a href="{{ $item->url }}">{{ $item->ten_hien_thi }}</a></li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>

        </div>
      </div>
