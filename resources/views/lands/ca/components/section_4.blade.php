<section class="theme-section awesome-feature-area bg-white padding_100 clearfix"
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
        <div class="section-heading text-center">
          <h2>{{ $section->title }}</h2>
          <p>{{ $section->subtitle }}</p>
          <div class="line-shape"></div>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach ($section->iconContents->chunk(3) as $iconContents)
        @foreach ($iconContents as $iconContent)
          <div class="{{ $iconContents->count() == 3 ? 'col-sm-4' : 'col-sm' }}">
            <div class="single-feature">
              <i class="{{ $iconContent->icon }}" aria-hidden="true"></i>
              <h5>{{ $iconContent->title }}</h5>
              <p>{{ $iconContent->content }}</p>
            </div>
          </div>
        @endforeach
      @endforeach

    </div>
  </div>
</section>
