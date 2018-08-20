@php
$index = 1;
@endphp
@foreach($ngonNgu as $item)
<tr>
  <td>{{ $index++ }}</td>
  <td>{{ $item->ma }}</td>
  <td>{{ $item->ten }}</td>
  <td>
    <img src="{{$item->url}}" alt="">
  </td>
  <td>
    @if ($item->id !== 1)
      <input class="form-control url_search" data-code="{{ $item->id }}" value="{{ $item->link_web }}">
    @endif
  </td>
  <td>
    @if($item->is_open === 'YES')
    <button class="btn btn-primary btn-xs btnNotActive" style="padding: 8px 20px;" txid="{{ $item->id }}">MỞ</button>
    @else
    <button class="btn btn-danger btn-xs btnActive" style="padding: 8px 24px;" txid="{{ $item->id }}">ĐÓNG</button>
    @endif
  </td>
</tr>
@endforeach
