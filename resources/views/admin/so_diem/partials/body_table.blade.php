@php
  $index = 1;
@endphp
@if(!empty($soDiem))
@foreach($soDiem as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td class="text-right">{{ $item->so_diem }}</td>
  <td>{{ $item->noi_dung }}</td>
  <td class="text-center">
    @if($item->kich_hoat === 'YES')
    <button class="btn btn-xs btn-success btnKichHoat" hash="{{ $item->id }}">Đã kích hoạt</button>
    @else
    <button class="btn btn-xs btn-danger btnKichHoat" hash="{{ $item->id }}">Chưa kích hoạt</button>
    @endif
  </td>
  <td class="text-nowrap text-center" width="95">
      <button type="button" class="btn btn-info btn-outline btn-circle btnEdit" hash="{{ $item->id }}"><i class="fa fa-edit"></i></button>
      <button type="button" class="btn btn-danger btn-outline btn-circle btnDelete" hash="{{ $item->id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colspan="5">Không có dữ liệu</td>
</tr>
@endif
