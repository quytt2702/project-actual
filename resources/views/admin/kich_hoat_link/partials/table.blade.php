<table class="table table-bordered product-overview">
  <thead>
    <tr>
      <th>#</th>
      <th>Url</th>
      <th>Loại link</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    @if (empty($url) || count($url) === 0)
    <tr>
      <td colspan="4">Không có dữ liệu</td>
    </tr>
    @else
    @php
      $index = 1;
      $ten_loai = [
        'LANDING PAGE' => 'Landing Page',
        'SAN PHAM'     => 'Sản phẩm',
        'TMDT'         => 'Thương mại điện tử',
        'CM SAN PHAM'  => 'Chuyên mục sản phẩm',
      ];
    @endphp
    @foreach($url as $item)
    <tr>
      <td class="text-center">{{ $index++ }}</td>
      <td>
        <a href="{{ config('app.url') }}{{ $item->url_url }}">{{ config('app.url') }}{{ $item->url_url }}</a>
      </td>
      <td>{{ $ten_loai[$item->url_ten_loai] }}</td>
      <td class="text-nowrap text-center">
        @if ($item->is_view_cong_tac_vien === 'YES')
        <button class="btn btn-warning btn-block btnThayDoi" data-code="{{ $item->url_url }}">Hiển thị</button>
        @else
        <button class="btn btn-danger btn-block btnThayDoi" data-code="{{ $item->url_url }}">Không hiển thị</button>
        @endif
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{!! view_paginate_buttons($url) !!}
