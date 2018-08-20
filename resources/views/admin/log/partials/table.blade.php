<div class='table-responsive'>
  <table class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>NỘI DUNG</th>
        <th>THỂ LOẠI</th>
        <th>NGÀY TẠO</th>
      </tr>
    </thead>
    <tbody>
      @if (empty($logs) || count($logs) === 0)
      <tr>
        <td colspan="4">Không có dữ liệu</td>
      </tr>
      @else
      @php
      $index = 1;
      @endphp
      @foreach ($logs as $item)
      <tr>
        <td class="text-center">{{ $index++ }}</td>
        <td>{{ $item->noi_dung }}</td>
        <td class="text-center" >
          @if ($item->the_loai === 'INFO')
          <label class='label label-info'>Info</label>
          @elseif ($item->the_loai === 'WARNING')
          <label class='label label-warning'>Warning</label>
          @else
          <label class='label label-danger'>Error</label>
          @endif
        </td>
        <td class="text-center">{{ $item->created_at }}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  {!! view_paginate_buttons($logs) !!}
</div>
