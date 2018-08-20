<div class="cat_menu_container">
  <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
    <div class="cat_burger"><span></span><span></span><span></span></div>
    <div class="cat_menu_text">{{ $ten_menu_doc }}</div>
  </div>
  <ul class="cat_menu">
    @foreach($menu_doc as $item)
    <li><a href="{{ $item->url_co_san }}">{{ $item->ten_hien_thi }}<i class="fas fa-chevron-right ml-auto"></i></a></li>
    @endforeach
  </ul>
</div>
