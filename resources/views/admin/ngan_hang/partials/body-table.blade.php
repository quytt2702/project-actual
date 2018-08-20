@php
  $index = 1;
@endphp
@if(!empty($nganHang))
@foreach($nganHang as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->ten_ngan_hang }}</td>
  <td class="text-nowrap text-center" width="95">
      <button type="button" class="btn btn-info btn-outline btn-circle btnEdit" txid="{{ $item->id }}"><i class="fa fa-edit"></i></button>
      <button type="button" class="btn btn-danger btn-outline btn-circle btnDelete" txid="{{ $item->id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colspan="3">Không có dữ liệu</td>
</tr>
@endif
