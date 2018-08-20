<h3 class="box-title">Trích Dẫn</h3>
<div class="quotes__wrapper">
  @foreach (range(1, 4) as $quote)
  <div class="quotes__item">

    @include('admin.landing_page.themes.ca.components.quote_item', [
      'section_name' => $section_name,
      'field_name' => $field_name,
    ])

  </div>
  @endforeach
</div>
