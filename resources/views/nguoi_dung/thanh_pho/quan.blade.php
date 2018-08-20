@foreach($quan as $item)
  <option value='{{ $item->districtid }}'>{{ "$item->type $item->name" }}</option>
@endforeach
