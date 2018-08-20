@php
  $index = 1;
@endphp
@if(!empty($nganHang))
@foreach($nganHang as $item)
<tr>
  <td>{{ $index++ }}</td>
  <td>{{ $item->ten_ngan_hang }}</td>
  <td>
    <button type="button" class="btn btn-info btn-outline btn-circle m-r-5 btnEdit" txid="{{ $item->id }}"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger btn-outline btn-circle m-r-5 btnDelete" txid="{{ $item->id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colpan="3">Không có dữ liệu</td>
</tr>
@endif
