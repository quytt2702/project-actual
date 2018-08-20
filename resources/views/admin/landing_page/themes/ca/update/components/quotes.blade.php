<h3 class="box-title">Trích Dẫn</h3>
<div class="quotes__wrapper">
  @foreach (range(0, 3) as $quoteIndex)
    <div class="quotes__item">

      @include('admin.landing_page.themes.ca.update.components.quote_item', [
        'section_name' => $section_name,
        'field_name' => $field_name,
      ])

    </div>
  @endforeach
</div>
