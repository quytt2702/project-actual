<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered">
    <tr>
      <th>#</th>
      <th>Mã đơn hàng</th>
      <th>Tên sản phẩm</th>
      <th>Ngày bán</th>
      <th>Khách hàng mua</th>
      <th>Số lượng bán</th>
    </tr>
    @if(empty($sanPham) || count($sanPham) === 0)
    <tr>
      <td colspan="6">Không có dữ liệu</td>
    </tr>
    @else
    @php
    $index = 1;
    @endphp
    @foreach($sanPham as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>
        {{ $item->hash }}
      </td>
      <td>
        {{ $item->san_pham_ten }}
      </td>
      <td>
        {{ substr($item->created_at, 0, 10) }}
      </td>
      <td>
        {{ $item->email_khach_hang_mua }}
      </td>
      <td>
        {{ $item->so_luong }}
      </td>
    </tr>
    @endforeach
    @endif
  </table>
  {!! view_paginate_buttons($sanPham) !!}
</div>
