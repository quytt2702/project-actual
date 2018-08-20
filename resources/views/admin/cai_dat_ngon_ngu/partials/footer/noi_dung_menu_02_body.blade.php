@php
  $index = 1;
@endphp
@if (empty($noiDungMenu02) || count($noiDungMenu02) === 0)
  <tr>
    <td colspan="4">Không có dữ liệu</td>
  </tr>
@else
@foreach($noiDungMenu02 as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->ten_hien_thi }}</td>
  <td>{{ $item->url }}</td>
  <td class="text-center"><button class="btn btn-circle btn-outline btn-danger btnXoaMenuFooter" data-url="{{ $item->url }}" data-code="2">-</button></td>
</tr>
@endforeach
@endif
