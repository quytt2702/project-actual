<div class="section-links section_link__{{ $section->code }}_{{ $section->hash }}">
  <div class="clearfix section-links__header--action">
    <button class="btn btn-primary pull-right btn-add-link" data-section-code="{{ $section->code }}" data-section-hash="{{ $section->hash }}">Tạo Liên Kết</button>
  </div>
  <div class="added-links__wrapper">
    @if (!empty($section->links))
      @foreach ($section->links as $link)
        @include('admin.landing_page.themes.ca.update.components.links_item', compact('link', 'section'))
      @endforeach
    @endif
  </div>
</div>
