<section class="theme-section special-area bg-white section_padding_100"
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
      <div class="col-12">
        <!-- Section Heading Area -->
        <div class="section-heading text-center">
          <h2>{{ $section->title }}</h2>
          <p>{{ $section->subtitle }}</p>
          <div class="line-shape"></div>
        </div>
      </div>
    </div>
    @if (!empty($section->iconContents))
      <div class="row">
        @foreach ($section->iconContents as $iconContent)
          <div class="col-md">
            <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
              <div class="single-icon">
                <i class="{{ $iconContent->icon }}" aria-hidden="true"></i>
              </div>
              <h4>{{ $iconContent->title }}</h4>
              <p>{{ $iconContent->content }}</p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
<!-- ***** Special Area End ***** -->
