<h3 class="box-title">Slideshow</h3>
<div class="slideshow__wrapper">
  @foreach (range(1, 6) as $actionIndex)
    <div class="slideshow__item">

      @include('admin.landing_page.themes.ca.update.components.carousel_uploader_item', [
        'section_name' => $section_name,
        'field_name' => $field_name,
      ])

    </div>
  @endforeach
</div>
