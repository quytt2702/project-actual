<section class="theme-section app-screenshots-area bg-white section_padding_100 clearfix"
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
    <div class="row">
      <div class="col-12 text-center">
        <!-- Heading Text  -->
        <div class="section-heading">
          <h2>{{ $section->title }}</h2>
          <p>{{ $section->subtitle }}</p>
          <div class="line-shape"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if (!empty($section->actionImages))
          @php
            $carouselId = str_random();
          @endphp
          <div class="app_screenshots_slides owl-carousel">
            @foreach ($section->actionImages as $index => $actionImage)
              <div class="single-shot">
                <img src="{{ $actionImage->image_url }}" alt="">
              </div>
            @endforeach
          </div>

          {{-- <div id="carousel_{{ $carouselId }}" class="carousel__wrapper" data-ride="carousel">
            @foreach ($section->actionImages as $index => $actionImage)
              <div class="carousel__item">
                <img src="{{ $actionImage->image_url }}" alt="">
              </div>
            @endforeach
          </div>
          <script type="text/javascript">
            $(function () {
              $('#carousel_{{ $carouselId }}').slick({
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });
            });
          </script> --}}
        @endif
      </div>
    </div>
  </div>
</section>
<!-- ***** App Screenshots Area End *****====== -->
