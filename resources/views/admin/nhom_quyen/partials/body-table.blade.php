@php
  $index = 1;
@endphp
@if(count($nhomQuyen) > 0)
@foreach($nhomQuyen as $item)
<tr>
  <td>{{ $index++ }}</td>
  <td>{{ $item->ten_nhom }}</td>
  <td>{{ $item->mo_ta }}</td>
  <td class="text-center">
    <button type="button" class="btn btn-info btn-outline btn-circle m-r-5 btnEdit" txid="{{ $item->id }}"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger btn-outline btn-circle m-r-5 btnDelete" txid="{{ $item->id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colpan="4">Không có dữ liệu</td>
</tr>
@endif
