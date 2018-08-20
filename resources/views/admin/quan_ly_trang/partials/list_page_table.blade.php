<table class="table table-bordered table-hover table-striped">
  <thead class="thead-inverse">
    <tr>
      <th class="text-center">#</th>
      <th>URL</th>
      <th>Tên trang</th>
      <th>Người tạo</th>
      <th>Người sửa</th>
      <th>Ngày tạo</th>
      <th>Hiển thị</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($tmdtPage) || count($tmdtPage) === 0)
      <tr>
        <td colspan="8">Không có dữ liệu</td>
      </tr>
    @else
    @php
      $index = 1;
    @endphp
    @foreach ($tmdtPage as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>
        <a href="{{ env('APP_URL') }}{{ $item->url }}">{{ $item->url }}</a>
      </td>
      <td>{{ $item->ten_trang }}</td>
      <td>{{ $item->email_nguoi_tao }}</td>
      <td>{{ empty($item->email_nguoi_edit) ? 'Chưa sửa':$item->email_nguoi_edit  }}</td>
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      <td>
        <div class="text-center">
          @if ($item->is_view === 'YES')
          <i class="fa fa-check-circle fa-2x btnHienThi" data-code="{{ $item->id }}" style="color: #2ecc71"></i>
          @else
          <i class="fa fa-times-circle fa-2x btnHienThi" data-code="{{ $item->id }}" style="color: #e74c3c"></i>
          @endif
        </div>
      </td>
      <td class="text-nowrap text-center">
        <a href="{{ route('admin.quan_ly_trang.edit', $item->id) }}" class="btn btn-info btn-outline btn-circle"><i class="fa fa-edit"></i></a>
        <button class="btn btn-danger btn-outline btn-circle btnDelete" hash="{{ $item->id }}"><i class="ti-trash"></i></button>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($tmdtPage) !!}
