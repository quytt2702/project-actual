<div class="section-icon-contents section_icon_contents__{{ $section->code }}_{{ lastItem(explode('_', $section->hash)) }}">
  <div class="clearfix section-icon-contents__header--action">
    <button class="btn btn-primary pull-right btn-add-icon-content" data-section-code="{{ $section->code }}" data-section-hash="{{ lastItem(explode('_', $section->hash)) }}">Tạo nội dung</button>
  </div>
  <div class="added-icon-contents__wrapper">
    @foreach ($section->iconContents as $iconContent)
      <div class="added-icon-contents__item">
        @include('admin.landing_page.themes.ca.update.components.icon_content', compact('iconContent'))
      </div>
    @endforeach
  </div>
</div>
