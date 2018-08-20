<!-- Recently Viewed -->
  <div class="viewed">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="viewed_title_container">
            <h3 class="viewed_title">{{ $tenView }}</h3>
            <div class="viewed_nav_container">
              <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
              <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>

          <div class="viewed_slider_container">

            <!-- Recently Viewed Slider -->

            <div class="owl-carousel owl-theme viewed_slider">

              <!-- Recently Viewed Item -->
              {{-- @foreach($items as $item)
              <div class="owl-item">
                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">{{ number_format($item->san_pham_gia_ban_thuc_te) }}<span>$300</span></div>
                    <div class="viewed_name"><a href="#">{{ $item->san_pham_ten }}</a></div>
                  </div>
                </div>
              </div>
              @endforeach --}}
              @foreach($items as $item)
              <div class="owl-item">
                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
                  <div class="viewed_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">{{-- 3,000 VND<span>$300</span> --}} {{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</div>
                    <div class="viewed_name" style="white-space: nowrap; overflow: hidden; max-width: 200px; text-overflow: ellipsis;"><a href="#">{{ $item->san_pham_ten }}</a></div>
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
