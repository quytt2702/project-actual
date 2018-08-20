<!-- ***** Our Team Area Start ***** -->
<section class="theme-section our-Team-area bg-white section_padding_100_50 clearfix"
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
    <div class="row">
      @foreach ($section->actionImages as $actionImage)
        <div class="col-md">
          <div class="single-team-member">
            <div class="member-image">
              <img src="{{ $actionImage->image_url }}" alt="">
              <div class="team-hover-effects">
                <div class="team-social-icon">
                  <a href="{{ $actionImage->url }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <div class="member-text">
              @if (!empty($actionImage->title))
                <h4>{{ $actionImage->title }}</h4>
              @endif
              @if (!empty($actionImage->subtitle))
                <p>{{ $actionImage->subtitle }}</p>
              @endif
              @if (!empty($actionImage->content))
                {!! $actionImage->content !!}
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- ***** Our Team Area End ***** -->
