<table class="table table-bordered">
<thead>
  <tr>
    <th>#</th>
    <th>Email người được thưởng</th>
    <th>Số tiền</th>
    <th>Lí do</th>
    <th>Ngày thưởng</th>
  </tr>
</thead>
<tbody>
  @if (empty($logThuongGioiThieu) || count($logThuongGioiThieu) === 0)
  <tr>
    <td colspan="4">Không có dữ liệu</td>
  </tr>
  @else
  @php
  $index = 1;
  @endphp
  @foreach($logThuongGioiThieu as $item)
  <tr>
    <td>{{ $index++ }}</td>
    <td>{{ $item->ten_nguoi_lien_quan }}</td>
    <td>{{ number_format($item->so_tien) }} VND</td>
    <td>{{ $item->li_do }}</td>
    <td>{{ substr($item->created_at, 0, 10) }}</td>
  </tr>
  @endforeach
  @endif
</tbody>
</table>
{!! view_paginate_buttons($logThuongGioiThieu) !!}
