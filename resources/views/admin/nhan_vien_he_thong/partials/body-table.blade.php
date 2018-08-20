@if(!empty($admin))
@php
  $index = 1;
@endphp
@foreach($admin as $item)
<tr class="{{ ($item->is_block === 'NO') ? '':'text-danger' }}">
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->email }}</td>
  <td>{{ $item->ho_va_ten }}</td>
  <td>{{ $item->ten_nhom }}</td>
  <td>{{ $item->mo_ta }}</td>
  <td class="text-center">
    <button type="button" class="btn {{ ($item->is_block === 'NO') ? 'btn-info':'btn-danger' }} btn-outline btn-circle m-r-5 btnBlock" hash="{{ $item->id_admin }}"><i class="fa fa-ban"></i></button>
  </td>
  <td class="text-center">
    <button type="button" class="btn btn-info btn-outline btn-circle m-r-5 btnEdit" hash="{{ $item->id_admin }}"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger btn-outline btn-circle m-r-5 btnDelete" hash="{{ $item->id_admin }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colpan="7">Không có dữ liệu</td>
</tr>
@endif
