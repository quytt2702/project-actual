<section class="theme-section clients-feedback-area bg-white padding_100 clearfix"
  id="{{ $section->hash }}"
  style="
    @if (!empty($section->background_image))
      background-image: url('{{ $section->background_image }}');
    @endif
    @if (!empty($section->background_color))
      background-color: {{ $section->background_color }} !important;
    @endif
  "
>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        @if (!empty($section->quotes))
        <div class="slider slider-for">
          @foreach ($section->quotes as $quote)
            <div class="client-feedback-text text-center">
              <div class="client">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <div class="client-description text-center">
                <p>“ {{ $quote->content }} ”</p>
              </div>
              <div class="star-icon text-center">
                @if ($quote->stars > 0)
                  @foreach (range(1, floor($quote->stars)) as $star)
                    <i class="ion-ios-star"></i>
                  @endforeach
                @endif
              </div>
              <div class="client-name text-center">
                <h5>{{ $quote->author }}</h5>
                <p>{{ $quote->subtitle }}</p>
              </div>
            </div>
          @endforeach
        </div>
        @endif
      </div>
      <!-- Client Thumbnail Area -->
      <div class="col-12 col-md-6 col-lg-5">
        @if (!empty($section->quotes))
          <div class="slider slider-nav">
            @foreach ($section->quotes as $quote)
              <div class="client-thumbnail">
                <img src="{{ $quote->author_image_url }}" alt="">
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
<!-- ***** Client Feedback Area End ***** -->
