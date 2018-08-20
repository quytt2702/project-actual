<div id="pagi-lich-su-nap">
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>Số điểm</th>
      <th>Trạng thái</th>
      <th>Thời gian</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($lichSuNapDiem) || count($lichSuNapDiem) === 0)
    <tr>
      <td colspan="4">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach($lichSuNapDiem as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td class="text-center">{{ $item->so_diem }}</td>
      @if ($item->trang_thai === 'YES')
      <td>
        <label class="label label-success">Đã nạp thành công</label>
      </td>
      @else
      <td>
        <label class="label label-danger">Nạp điểm thất bại</label>
      </td>
      @endif
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($lichSuNapDiem) !!}
</div>
