@php
$index = 1;
@endphp
@foreach($tabs as $item)
<tr>
  <td class="text-center" style="width: 60px;">{{ $index++ }}</td>
  <td>
    <span class="ten_tab" hash="{{ $item->id }}">
      {{ $item->ten_tab }}
    </span>
  </td>
  <td class="text-center" style="width: 120px;">
    @if ($item->is_open === 'YES')
      <button class="btn btn-success btnEditStatus" hash="{{ $item->id }}" style="width: 60px;">Mở</button>
    @else
      <button class="btn btn-danger btnEditStatus" hash="{{ $item->id }}">Đóng</button>
    @endif
  </td>
</tr>
@endforeach
