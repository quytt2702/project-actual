<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Ngày rút</th>
      <th>Số tiền</th>
      <th>Ngân hàng</th>
      <th>Tình trạng</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($logRutTienVND) || count($logRutTienVND) === 0)
    <tr>
      <td colspan="7">Không có dữ liệu</td>
    </tr>
    @else
    @php
      $index = 1;
    @endphp
    @foreach($logRutTienVND as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td class="text-nowrap text-right">{{ $item->created_at }}</td>
      <td class="text-nowrap text-center">{{ number_format($item->so_tien) }} VND</td>
      <td>{{ $item->ngan_hang }}</td>
      @if($item->tinh_trang === 'Success')
          <td>Đã rút tiền thành công vào ngày {{ $item->updated_at }}</td>
      @else
          <td>{{ $item->thong_bao }}</td>
      @endif
      <td>
      @if($item->tinh_trang === 'Pending')
        <button type="" class="btn btn-xs btn-danger btnHuyBo" data-code="{{ $item->id }}">Huỷ bỏ</button>
      @else
          {{ $item->tinh_trang }}
      @endif
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
