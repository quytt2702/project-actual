<!-- Special Description Area -->
<div class="theme-section bg-white special_description_area padding_150"
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
      <div class="col-lg-6">
        <div class="special_description_content">
          @if (!empty($section->title))
            <h2>{{ $section->title }}</h2>
          @endif
          @if (!empty($section->subtitle))
            <p>{{ $section->subtitle }}</p>
          @endif
          @if (!empty($section->content))
            {!! $section->content !!}
          @endif
          @include('lands.ca.partials.form', ['info' => $section->info])
        </div>
      </div>
      <div class="col-lg-6">
        <div class="special_description_img text-center">
          <img src="{{ $section->image_url }}" alt="">
        </div>
        <div class="section_center">
          <div class="section_center">
            @include('lands.ca.partials.clock', compact('section'))
          </div>
        </div>
        @if ($section->links->count() > 0)
          <div class="app-download-area">
            @foreach ($section->links as $link)
              <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                <a href="{{ $link->url }}">{{ $link->content }}</a>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
