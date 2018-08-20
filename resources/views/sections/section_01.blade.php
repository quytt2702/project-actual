<div class="new_arrivals" style="padding-top: 30px; padding-bottom: 0;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="tabbed_container">
          <div class="tabs clearfix tabs-right">
            <div class="new_arrivals_title">{{ $tenView }}</div>
            <div class="tabs_line"></div>
          </div>
          <div class="row">
            <div class="col-lg-12" style="z-index:1;">
              <!-- Product Panel -->
              <div class="featured_slider slider">
                {{-- @foreach (range(1, 9) as $index) --}}
                @foreach ($items as $item)
                <!-- Slider Item -->
                <div class="featured_slider_item" >
                  <div class="border_active"></div>
                  <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                      <img src="{{ $item->san_pham_hinh_dai_dien }}" alt="">
                    </div>
                    <div class="product_content">
                      <div class="product_price">{{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</div>
                      <div class="product_name">
                        <div>
                          <a href="{{ $item->san_pham_url }}" tabindex="0">{{ $item->san_pham_ten }}</a>
                        </div>
                      </div>
                      <div class="product_extras">
                        <button class="product_cart_button" tabindex="0">Chi tiết</button>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {{-- @endforeach --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
