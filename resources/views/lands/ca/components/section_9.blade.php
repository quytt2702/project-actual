<section class="theme-section our-monthly-membership section_padding_50 clearfix"
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
    <div class="row align-items-center">
      <div class="col-md-8">
        <div class="membership-description">
          @if (!empty($section->title))
            <h2{{ $section->title }}</h2>
          @endif
          @if (!empty($section->subtitle))
            <p>{{ $section->subtitle }}</p>
          @endif
          @if (!empty($section->content))
            {!! $section->content !!}
          @endif
        </div>
      </div>
      <div class="col-md-4">
        @foreach ($section->links as $link)
          <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
            <a href="{{ $link->url }}">{{ $link->content }}</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- ***** CTA Area End ***** -->
