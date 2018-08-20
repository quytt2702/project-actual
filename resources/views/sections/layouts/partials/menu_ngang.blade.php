<div class="main_nav_menu ml-auto">
  <ul class="standard_dropdown main_nav_dropdown">
    @foreach($menuNgang as $item)
    @if (!empty($item->children))
    <li class="hassubs">
      <a href="{{ $item->href }}">{{ $item->text }}<i class="fas fa-chevron-down"></i></a>
      <ul>
        @foreach($item->children as $sub_item)
        <li>
          <a href="{{ $sub_item->href }}">{{ $sub_item->text }}<i class="fas fa-chevron-down"></i></a>
        </li>
        @endforeach
      </ul>
    </li>
    @else
    <li><a href="{{ $item->href }}">{{ $item->text }}<i class="fas fa-chevron-down"></i></a></li>
    @endif
    @endforeach
  </ul>
</div>
