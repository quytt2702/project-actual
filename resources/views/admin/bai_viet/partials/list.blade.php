<div class="col-sm-12">
  <div class="form-horizontal">
    <div class="table-responsive m-t-20">
      <table class="table table-hover table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>TIÊU ĐỀ</th>
            <th>LINK</th>
            <th>TRẠNG THÁI</th>
            <th>NGƯỜI TẠO</th>
            <th>NGƯỜI SỬA</th>
            <th>HÀNH ĐỘNG</th>
          </tr>
        </thead>
        <tbody>
          @if(empty($baiViet) || count($baiViet) === 0)
          <tr>
            <td colspan="7">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($baiViet as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td>{{ $item->tieu_de }}</td>
            <td class="text-primary">

              <a href="{{ config('app.url') }}{{$item->url}}">{{ $item->url }}</a>
            </td>
            <td class="text-center">
              @if($item->is_accept === 'NO')
              <span class="label label-danger"">NO</span>
              @else
              <span class="label label-success"">YES</span>
              @endif
            </td>
            <td class="text-nowrap">{{ $item->nguoi_tao }}</td>
            <td class="text-nowrap">{{ $item->nguoi_sua }}</td>
            @if ($trangThai === 'Trash')
            <td class="text-center text-nowrap">
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
              <button class="btn btn-xs btn-success btnKhoiPhuc" hash="{{ $item->id }}">Khôi phục</button>
              {{-- <button class="btn btn-xs btn-warning" hash="{{ $item->id }}">Xem trước</button> --}}
            </td>
            @else
            <td class="text-nowrap">
              <button class="btn btn-xs btn-danger btnXoa" hash="{{ $item->id }}">Xoá</button>
              <button class="btn btn-xs btn-primary btnSua" hash="{{ $item->id }}">Sửa</button>
              @if ($item->is_accept === 'YES')
              <button class="btn btn-xs btn-warning btnDuyet" hash="{{ $item->id }}">Bỏ Duyệt</button>
              @else
              <button class="btn btn-xs btn-success btnDuyet" hash="{{ $item->id }}">Duyệt</button>
              @endif
              {{-- <button class="btn btn-xs btn-warning" hash="{{ $item->id }}">Xem trước</button> --}}
            </td>
            @endif
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($baiViet) !!}
    </div>
  </div>
</div>
