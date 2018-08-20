<h3 class="box-title">Liên Kết Ảnh</h3>
<div class="action-images__wrapper">
  @foreach (range(1, 3) as $actionIndex)
  <div class="action-images__item">

    @include('admin.landing_page.themes.ca.components.action_image', [
      'section_name' => $section_name,
      'field_name' => $field_name,
    ])

  </div>
  @endforeach
</div>
