<div class="col-sm-12">
  <div class="form-horizontal">
    <div class="table-responsive" id="pagi">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên</th>
            <th>Url</th>
            <th>Số lượng tồn kho</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @if (empty($sanPham) || count($sanPham) === 0)
          <tr>
            <td colspan="5">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($sanPham as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td class="text-nowrap">{{ $item->san_pham_ten }}</td>
            <td>
              <a href="{{  env('APP_URL') . '/' . $item->san_pham_url }}">{{  env('APP_URL') . '/' . $item->san_pham_url }}</a>
            </td>
            <td class="text-right">{{ $item->san_pham_so_luong}}</td>
            <td class="text-center"> <a href="{{ route('admin.ton_kho.chi_tiet', $item->id) }}" class="btn btn-primary btnDetail" >Chi tiết</a> </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($sanPham) !!}

    </div>
  </div>
</div>
