<div class="trends">
  <div class="trends_background" style="background-image:url(/one_tech_template/images/trends_background.jpg)"></div>
  <div class="trends_overlay"></div>
  <div class="container">
    <div class="row">
      <!-- Trends Content -->
      <div class="col-lg-3">
        <div class="trends_container">
          <h2 class="trends_title">{{ $tenView }}</h2>
          <div class="trends_text"><p>{!! $item->noi_dung_html !!}</p></div>
          <div class="trends_slider_nav">
            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
          </div>
        </div>
      </div>
      <!-- Trends Slider -->
      <div class="col-lg-9">
        <div class="trends_slider_container">
          <!-- Trends Slider -->
          <div class="owl-carousel owl-theme trends_slider">

            <!-- Trends Slider Item -->
            {{-- @foreach($items as $item)
            <div class="owl-item">
              <div class="trends_item is_new">
                <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div>
                <div class="trends_content">
                  <div class="trends_category"><a href="#">Smartphones</a></div>
                  <div class="trends_info clearfix">
                    <div class="trends_name"><a href="product.html">{{ $item->san_pham_ten }}</a></div>
                    <div class="trends_price">{{ number_format($item->san_pham_gia_ban_thuc_te) }}</div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach --}}
            @foreach($items as $item)
            <div class="owl-item">
              <div class="trends_item is_new" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                  <img src="{{ $item->san_pham_hinh_dai_dien }}" alt="">
                </div>
                <div class="trends_content">
                  <div class="trends_category">{{-- <a href="#">{{ $item->chuyen_muc_san_pham_ten }}</a> --}}</div>
                  <div class="trends_info clearfix">
                    <div class="trends_name" style="white-space: nowrap; overflow: hidden; max-width: 130px; text-overflow: ellipsis;"><a href="{{ $item->san_pham_url }}">{{ $item->san_pham_ten }}</a></div>
                    <div class="trends_price">{{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

