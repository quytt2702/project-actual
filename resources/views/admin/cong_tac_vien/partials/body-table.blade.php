<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>Tên khách hàng</th>
      <th>Địa chỉ</th>
      <th>Ngân hàng</th>
      <th>Ảnh đại diện</th>
      <th>Block</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($congTacVien) || count($congTacVien) === 0)
    <tr>
      <td colspan="7">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach ($congTacVien as $item)
    <tr {!! ($item->is_block === 'YES') ? 'style="color: red;"' : '' !!}>
      <td class="text-center">{{ $index++ }}</td>
      <td>{{ $item->ho_va_ten }}
        <br>
        <span class="text-primary">{{ $item->email }}</span>
      </td>
      <td>
        {{ $item->dia_chi_hien_tai }}
      </td>
      <td>
        Số tài khoản: {{ $item->so_tai_khoan }}, tại ngân hàng {{ $item->ten_ngan_hang }}<br>
        <span class="text-primary">Chủ tài khoản: {{ $item->ho_va_ten }}, chi nhánh {{ $item->ten_chi_nhanh }}</span>
      </td>
      <td class="text-center">
        <div class="zoom" style="width: 100%;">
          <img src="{{ $item->avatar }}" alt="" style="width: 70px;">
        </div>
      </td>
      <td class="text-center text-nowrap">
        @if ($item->is_block === 'YES')
        <button class="btn btn-primary btnBlock" hash="{{ $item->txid }}">UnBlock</button>
        @else
        <button class="btn btn-danger btnBlock" hash="{{ $item->txid }}">Block</button>
        @endif
      </td>
      <td class="text-center text-nowrap">
        <a class="details" txid="{{ $item->txid }}" href="{{ route('admin.cong_tac_vien.show', $item->txid) }}" data-toggle="tooltip" data-original-title="Details"><i class="fa fa-eye text-primary m-r-5"></i></a>
        <a class="edit" txid="{{ $item->txid }}" href="{{ route('admin.cong_tac_vien.edit', $item->txid) }}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-inverse m-r-5"></i></a>
        <a class="delete" txid="{{ $item->txid }}" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Close"><i class="fa fa-close text-danger m-r-5"></i></a>
        <a class="login" txid="{{ $item->txid }}" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Login user"><i class="ti ti-lock text-primary"></i></a>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($congTacVien) !!}
