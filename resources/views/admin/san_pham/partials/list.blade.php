<div class="col-sm-12 m-t-20">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên</th>
            <th>Url</th>
            <th>Mô tả</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @if (empty($sanPham) || count($sanPham) === 0)
          <tr>
            <td colspan="6">Không có dữ liệu</td>
          </tr>
          @else
          @php
            $index = 1;
          @endphp
          @foreach ($sanPham as $item)
          <tr>
            <td>{{ $index++ }}</td>
            <td class="text-nowrap">{{ $item->san_pham_ten }}</td>
            <td>
              <a href="{{  env('APP_URL') . $item->san_pham_url }}">{{  env('APP_URL') . $item->san_pham_url }}</a>
            </td>
            <td style="white-space: nowrap; overflow: hidden; max-width: 200px; text-overflow: ellipsis;">
              {!! $item->san_pham_mo_ta !!}
            </td>
            @if ($trangThai === 'Trash')
            <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-success btnKhoiPhuc" hash="{{ $item->id }}">Khôi phục</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
            </td>
            @else
            <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-primary btnSua" hash="{{ $item->id }}">Sửa</button>
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
            </td>
            @endif
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($sanPham) !!}
    </div>
  </div>
</div>
