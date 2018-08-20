@php
  $index = 1;
@endphp
@if (empty($noiDungMenu01) || count($noiDungMenu01) === 0)
  <tr>
    <td colspan="4">Không có dữ liệu</td>
  </tr>
@else
@foreach($noiDungMenu01 as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->ten_hien_thi }}</td>
  <td>{{ $item->url }}</td>
  <td class="text-center"><button class="btn btn-circle btn-outline btn-danger btnXoaMenuFooter" data-url="{{ $item->url }}" data-code="1">-</button></td>
</tr>
@endforeach
@endif
