<div class="col-sm-12">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Email</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>CMND</th>
            <th>Số lần bán hàng</th>
          </tr>
        </thead>
        <tbody >
          @if (empty($congTacVien) || count($congTacVien) === 0)
          <tr>
            <td colspan="6">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($congTacVien as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td class="text-nowrap">{{ $item->cong_tac_vien_email }}</td>
            <td>{{ $item->cong_tac_vien_ho_va_ten }}</td>
            <td class="text-center">{{ $item->cong_tac_vien_so_dien_thoai }}</td>
            <td class="text-center">{{ $item->cong_tac_vien_cmnd }}</td>
            <td class="text-right">{{ $item->so_luong }}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {{-- {!! view_paginate_buttons($congTacVien) !!} --}}
    </div>
  </div>
</div>
