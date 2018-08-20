@foreach($phuong as $item)
  <option value='{{ $item->wardid }}'>{{ "$item->type $item->name" }}</option>
@endforeach
