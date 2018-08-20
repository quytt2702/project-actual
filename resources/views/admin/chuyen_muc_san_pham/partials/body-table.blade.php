@php
  $index = 1;
@endphp
@if(!empty($chuyenMucSanPham))
@foreach($chuyenMucSanPham as $item)
<tr>
  <td class="text-center">{{ $index++ }}</td>
  <td>{{ $item->chuyen_muc_san_pham_ten }}</td>
  <td>{{ $item->chuyen_muc_san_pham_url }}</td>
  <td>{{ $item->ten }}</td>
  <td>
    <div class="text-center">
      @if ($item->chuyen_muc_san_pham_is_active === 'YES')
        <span class="label label-success">Có</span>
      @else
        <span class="label label-danger">Không</span>
      @endif
    </div>
  </td>
  <td>
    <div class="text-center">
      <button type="button" class="btn btn-info btn-outline btn-circle btnEdit" hash="{{ $item->id }}"><i class="fa fa-edit"></i></button>
    </div>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colpan="6">Không có dữ liệu</td>
</tr>
@endif
