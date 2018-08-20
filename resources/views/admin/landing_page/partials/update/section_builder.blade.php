<div class="row">
  <div class="col-sm-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="box-title">Tạo nội dung cho các mục</h3>
      </div>
      <div class="panel-body">
        <div id="chosen-sections" class="chosen-section__container">

          @foreach ($theme->sections as $section)
            <section class="chosen-section__item">
              @include("admin.landing_page.themes.ca.update.{$section->code}", compact('section'))
            </section>
          @endforeach

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="box-title">Chọn mục</h3>
      </div>
      <div class="panel-body">
        <div id="section-selectors" class="theme-sections__container">
          @foreach ($sections as $section)
            <div class="theme-sections__selection">
              <span class="selection__wrapper">
                <span class="backdrop__wrapper">
                  <span class="backdrop__content">
                    <span style="display: block; color: #fff; height: 28px;">{{ $section->code }}</span>
                    <a href="{{ url($section->icon) }}" class="image-popup"><i class="ti-zoom-in"></i></a>
                    <a href="javascript:void(0)" class="section-selector__item" data-section-code="{{ $section->code }}" data-code="admin.landing_page.themes.ca.{{ $section->code }}"><i class="ti-plus"></i></a>
                  </span>
                </span>
                <img class="selection__wrapper__img" src="{{ url($section->icon) }}">
              </span>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
