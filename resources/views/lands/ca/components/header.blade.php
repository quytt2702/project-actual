<header class="header_area animated">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="menu_area">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
              @if (!empty($theme->logo))
                <img src="{{ $theme->logo }}" style="height: 50px; display: block;">
              @else
                <span>{{ $theme->title }}</span>
              @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="ca-navbar">
              @if (!empty($sections))
                <ul class="navbar-nav ml-auto" id="nav">
                  @foreach ($sections as $section)
                    <li class="nav-item">
                      <a class="nav-link" href="#{{ $section->hash }}">{{ $section->menu_title ?: $section->title }}</a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
