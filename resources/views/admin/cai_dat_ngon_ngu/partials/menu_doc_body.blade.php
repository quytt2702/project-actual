@php
  $index = 1;
@endphp
@foreach($menuDoc as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->ten_hien_thi }}</td>
  <td>{{ $item->url_co_san }}</td>
  <td class="text-center"><button class="btn btn-circle btn-outline btn-danger btnXoaMenuDoc" data-code="{{ $item->url_co_san }}">-</button></td>
</tr>
@endforeach
