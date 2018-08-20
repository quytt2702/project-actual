@php
$index = 1;
@endphp
@if(!empty($phanTramThuongDaiLy) && count($phanTramThuongDaiLy) > 0)
@foreach($phanTramThuongDaiLy as $item)
<tr>
  <td>{{ $index++ }}</td>
  <td class="text-right">{{ number_format($item->muc_yeu_cau_duoi) }} VND</td>
  <td class="text-right">{{ number_format($item->muc_yeu_cau_tren) }} VND</td>
  <td class="text-center">{{ $item->phan_tram_thuong }}%</td>
  <td class="text-center">
    <button type="button" class="btn btn-info btn-outline btn-circle btnEdit" txid="{{ $item->id }}"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-danger btn-outline btn-circle btnDelete" txid="{{ $item->id }}"><i class="ti-trash"></i></button>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colspan="5">Không có dữ liệu</td>
</tr>
@endif
