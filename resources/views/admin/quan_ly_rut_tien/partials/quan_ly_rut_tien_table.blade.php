<div class="table-responive">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Ngày rút</th>
        <th>Số tiền</th>
        <th>Ngân hàng</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      @if(empty($logRutTien) || count($logRutTien) === 0)
        <tr>
          <td colspan="5">Không có dữ liệu</td>
        </tr>
      @else
      @php
      $index = 1;
      @endphp
      @foreach($logRutTien as $item)
      <tr>
        <td class="text-center">{{ $index++ }}</td>
        <td class="text-nowrap text-center">{{ $item->created_at }}</td>
        <td class="text-nowrap text-right">{{ number_format($item->so_tien) }} VND</td>
        <td>{{ $item->ngan_hang }}</td>
        <td class="text-nowrap text-center">
          <button type="cancel" class="btn btn-xs btn-danger btnHuyBo" data-code="{{ $item->id }}">Huỷ bỏ</button>
          <button type="cancel" class="btn btn-xs btn-success btnDongY" data-code="{{ $item->id }}">Đồng ý</button>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
