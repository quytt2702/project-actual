<div class="input-group">
  <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
  <span class="input-group-addon">
    <i id="btnSearch"  class="fa fa-search"> </i>
  </span>
</div>
<div class="form-group m-t-20">
  <span class="font-bold">Link trang chủ: <span class="text-danger">{{ $link_trang_chu }}</span></span>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Url</th>
        <th>Thể loại</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      @if (empty($urls) || count($urls) === 0)
      <tr>
        <td colspan="7">Không có dữ liệu</td>
      </tr>
      @else
      @php
      $index = 1;
      @endphp
      @foreach($urls as $item)
      <tr>
        <td>{{ $index++ }}</td>
        <td>{{ $item->url_url }}</td>
        <td>{{ $item->url_ten_loai }}</td>
        <td class="text-center">
          @if ($item->url_url !== $link_trang_chu)
          <button type="button" class="btn btn-danger btnChon" data-url="{{ $item->url_url }}">Trang chủ</button>
          @else
          <span class="font-bold text-danger">Trang chủ</span>
          @endif
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  {!! view_paginate_buttons($urls) !!}
</div>
