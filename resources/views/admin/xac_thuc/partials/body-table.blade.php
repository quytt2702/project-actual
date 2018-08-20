<table class="table table-bordered table-striped table-hover m-t-20">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th><b>TÊN</b>/EMAIL</th>
      <th>EMAIL CTV</th>
      <th>TÊN CTV</th>
      <th>IP ĐĂNG KÝ</th>
      <th>NGÀY ĐĂNG KÝ</th>
      <th>HÀNH ĐỘNG</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($congTacVien) || count($congTacVien) === 0)
    <tr>
      <td colspan="8">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach ($congTacVien as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>
        <p><b>{{ $item->ho_va_ten }}</b></p>
        <p>{{ $item->email }}</p>
      </td>
      <td>{{ empty($item->email_ctv) ? 'Không có' : $item->email_ctv }}</td>
      <td>{{ empty($item->ho_va_ten_ctv) ? 'Không có' : $item->ho_va_ten_ctv }}</td>
      <td class="text-center">{{ $item->ip_dang_ky }}</td>
      <td class="text-center text-nowrap">{{ substr($item->cong_tac_vien_created_at, 0, 10) }}</td>
      <td class="text-center text-nowrap">
        <button class="btn btn-warning btn-xs btnDuyet" hash="{{ $item->cong_tac_vien_txid }}">Duyệt</button>
        <button class="btn btn-primary btn-xs btnChiTiet" hash="{{ $item->cong_tac_vien_txid }}">Chi tiết</button>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($congTacVien) !!}
