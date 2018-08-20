<!-- Reviews -->
<div class="reviews">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="reviews_title_container">
          <h3 class="reviews_title">{{ $tenView }}</h3>
        </div>

        <div class="reviews_slider_container">

          <!-- Reviews Slider -->
          <div class="owl-carousel owl-theme reviews_slider">

            <!-- Reviews Slider Item -->
            @foreach($items as $item)
            <div class="owl-item">
              <div class="review d-flex flex-row align-items-start justify-content-start" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
                <div><div class="review_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div></div>
                <div class="review_content">
                  <div class="review_name">{{ $item->san_pham_ten }}</div>
                  <div class="review_text" style="white-space: nowrap; overflow: hidden; max-width: 150px; text-overflow: ellipsis;"><p>{!! $item->san_pham_mo_ta !!}</p></div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
          <div class="reviews_dots"></div>
        </div>
      </div>
    </div>
  </div>
</div>

