<div class="col-sm-12 m-t-20">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại chính</th>
            <th>Số điện thoại phụ</th>
            <th>Thông tin thêm</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @if (empty($nhaCungCap) || count($nhaCungCap) === 0)
          <tr>
            <td colspan="8">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($nhaCungCap as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td>{{ $item->nha_cung_cap_ten }}</td>
            <td>{{ $item->nha_cung_cap_dia_chi }}</td>
            <td class="text-center">{{ $item->nha_cung_cap_phone_01 }}</td>
            <td class="text-center">{{ $item->nha_cung_cap_phone_02 }}</td>
            <td>{{ $item->nha_cung_cap_thong_tin_them }}</td>
            <td width="180" class="text-center">
              <img src="{{ $item->hinh_anh }}" alt="" width="150">
            </td>
            @if ($trangThai === 'Trash')
            <td class="text-center" width="200">
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
              <button class="btn btn-xs btn-success btnKhoiPhuc" hash="{{ $item->id }}">Khôi phục</button>
            </td>
            @else
            <td class="text-center" width="200">
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" hash="{{ $item->id }}">Sửa</button>
            </td>
            @endif
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($nhaCungCap) !!}
    </div>
  </div>
</div>
