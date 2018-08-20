<div class="best_sellers" style="margin-top: 0;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="tabbed_container">
          <div class="tabs clearfix tabs-right">
            <div class="new_arrivals_title">{{ $tenView }}</div>
            <ul class="clearfix">
              <li></li>
            </ul>
            <div class="tabs_line"><span></span></div>
          </div>

          <div class="bestsellers_panel panel active">
            <!-- Best Sellers Slider -->
            <div class="bestsellers_slider slider">
              {{-- <!-- Best Sellers Item -->
              @foreach($items as $item)
              <div class="bestsellers_item discount">
                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                  <div class="bestsellers_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div>
                  <div class="bestsellers_content">
                    <div class="bestsellers_category"><a href="#">Headphones</a></div>
                    <div class="bestsellers_name"><a href="product.html">{{ $item->san_pham_ten }}</a></div>
                    <div class="bestsellers_price discount">{{ number_format($item->san_pham_gia_ban_thuc_te) }}<span>$300</span></div>
                  </div>
                </div>
              </div>
              @endforeach --}}
              <!-- Best Sellers Item -->
              @foreach($items as $item)
              <div class="bestsellers_item discount" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                  <div class="bestsellers_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div>
                  <div class="bestsellers_content">
                    <div class="bestsellers_category">{{-- <a href="#">{{ $item->chuyen_muc_san_pham_ten }}</a> --}}</div>
                    <div class="bestsellers_name"><a href="{{config('app.url')}}{{ $item->san_pham_url }}">{{ $item->san_pham_ten }}</a></div>
                    <div class="bestsellers_price {{-- discount --}}">{{-- 3,000,000 VND<span>4,000,000 VND</span> --}} {{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</div>
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
</div>

