<div class="theme-section video-section padding_100"
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
        <div class="video-area" style="background-image: url({{ $section->image_url }});">
          <div class="video-play-btn">
            <a href="{{ $section->video_url }}" class="video_btn">
              <i class="fa fa-play" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
