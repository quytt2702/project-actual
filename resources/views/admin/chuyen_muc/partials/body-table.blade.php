@php
  $index = 1;
@endphp
@if(!empty($chuyenMuc))
@foreach($chuyenMuc as $item)
<tr>
  <td>{{ $index++ }}</td>
  <td>{{ $item->ten_chuyen_muc }}</td>
  <td>{{ $item->url }}</td>
  <td class="text-nowrap">{{ $item->ten }}</td>
  <td>
    <div class="text-center">
    @if ($item->is_active === 'YES')
      <i class="fa fa-check-circle fa-2x" style="color: #2ecc71"></i>
    @else
      <i class="fa fa-times-circle fa-2x" style="color: #e74c3c"></i>
    @endif
    </div>
  </td>
  <td class="text-nowrap text-center">
    <button type="button" class="btn btn-info btn-outline btn-circle btnEdit" hash="{{ $item->chuyen_muc_id }}"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger btn-outline btn-circle btnDelete" hash="{{ $item->chuyen_muc_id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colpan="5">Không có dữ liệu</td>
</tr>
@endif
