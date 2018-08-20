<table class="table table-hover">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>NAME</th>
      <th>ĐỊA CHỈ</th>
      <th>NGÂN HÀNG</th>
      <th>NHÓM QUYỀN</th>
      <th>DOANH THU</th>
      <th>TIỀN ĐÃ CHI</th>
      <th>THÀNH VIÊN</th>
      <th>MANAGE</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($nguoi_dung) || count($nguoi_dung) === 0)
    <tr>
      <td colspan="9">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach ($nguoi_dung as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>{{ $item->ho_va_ten }}
        <br>
        <span class="text-primary">{{ $item->email }}</span>
      </td>
      <td>
        {{ $item->dia_chi_hien_tai }} {{-- <br> <span class="text-primary">Hải châu, Đà Nẵng</span> --}}
      </td>
      <td>
        Số tài khoản: {{ $item->so_tai_khoan }}, tại ngân hàng {{ $item->ten_ngan_hang }}<br>
        <span class="text-primary">Chủ tài khoản: {{ $item->ho_va_ten }}, chi nhánh {{ $item->ten_chi_nhanh }}</span>
      </td>
      <td>{{ $item->ten_nhom }}</td>
      <td>10.560.000đ</td>
      <td>5.560.000đ</td>
      <td>10 thành viên </td>
      <td class="text-nowrap">
        <a class="details" txid="{{ $item->txid }}" href="{{ route('admin.nguoi_dung.show', $item->txid) }}" data-toggle="tooltip" data-original-title="Details"><i class="fa fa-eye text-primary m-r-10"></i></a>
        <a class="edit" txid="{{ $item->txid }}" href="{{ route('admin.nguoi_dung.edit', $item->txid) }}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-inverse m-r-10"></i></a>
        <a class="delete" txid="{{ $item->txid }}" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Close"><i class="fa fa-close text-danger"></i></a>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($nguoi_dung) !!}
