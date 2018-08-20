@php
$index = 1;
@endphp
@foreach($sliders as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->ten_hien_thi }}</td>
  <td>{{ $item->url_slider }}</td>
  <td style="width: 150px;">
    <img src="{{ $item->image }}" style="width: 100%; class="m-b-10">
  </td>
  <td class="text-center"><button class="btn btn-circle btn-outline btn-danger btnXoaSlider" url_slider="{{ $item->url_slider }}">-</button></td>
</tr>
@endforeach
