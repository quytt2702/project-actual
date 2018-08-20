<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Mã nạp</th>
      <th>Seri</th>
      <th>Số điểm</th>
      <th>Trạng thái</th>
      <th>Active</th>
      <th>Người tạo</th>
      <th>Ngày tạo</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($codeNapDiem) || count($codeNapDiem) === 0)
    <tr>
      <td colspan="8">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach($codeNapDiem as $item)
    <tr class="text-center">
      <td>{{ $index++ }}</td>
      <td>{{ $item->ma_nap_tien }}</td>
      <td>{{ $item->seri }}</td>
      <td>{{ $item->so_diem }}</td>
      <td>
        @if($item->trang_thai === 'NOT YET')
        <label class="label label-primary" hash="{{ $item->id }}">Chưa sử dụng</label>
        @else
        <label>
        <label class="label label-warning" hash="{{ $item->id }}">Đã sử dụng</label>
          <br> {{ $item->email_nguoi_nap }}
        </label>
        @endif
      </td>
      <td>
        @if($item->is_active === 'YES')
        <button class="btn btn-xs btn-success btnKichHoat" hash="{{ $item->id }}">Đã kích hoạt</button>
        @else
        <button class="btn btn-xs btn-danger btnKichHoat" hash="{{ $item->id }}">Chưa kích hoạt</button>
        @endif
      </td>
      <td>{{ $item->email_nguoi_tao }}</td>
      <td>{{ substr($item->created_at, 0, 10) }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($codeNapDiem) !!}
