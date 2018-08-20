<!-- ***** Contact Us Area Start ***** -->
<section class="theme-section footer-contact-area section_padding_100 clearfix"
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
      <div class="col-md-6">
        <!-- Heading Text  -->
        <div class="section-heading">
          <h2>{{ $section->title }}</h2>
          @if (!empty($section->subtitle))
            <p>{{ $section->subtitle }}</p>
          @endif
          <div class="line-shape"></div>
        </div>
        @if (!empty($section->content))
          {!! $section->content !!}
        @endif
      </div>
      <div class="col-md-6">
        @include('lands.ca.partials.form', ['info' => $section->info])
      </div>
    </div>
  </div>
</section>
<!-- ***** Contact Us Area End ***** -->
