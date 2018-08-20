<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover product-overview">
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
          <a href="{{ $item->url_url }}">{{ $item->url_url }}</a>
        </td>
        <td>{{ $ten_loai[$item->url_ten_loai] }}</td>
        <td class="text-nowrap text-center">
          <button id="btnCopy" class="btn icon-social-network" style="background-color: #1686b0; color: #fff;" url="{{ $item->url_url }}" data-toggle="tooltip" data-original-title="Sao chép URL vào bộ nhớ tạm"><i class="fa fa-copy"></i></button>
          <a class="btn icon-social-network" style="background-color: #4d70a8; color: #fff;" href="https://www.facebook.com/sharer.php?u={{ $item->url_url }}" data-toggle="tooltip" data-original-title="Chia sẻ lên Facebook"><i class="fa fa-facebook"></i></a>
          <a class="btn icon-social-network" style="background-color: #c63e24; color: #fff;" href="https://plus.google.com/share?url={{ $item->url_url }}" data-toggle="tooltip" data-original-title="Chia sẻ lên Google"><i class="fa fa-google"></i></a>
          <a class="btn icon-social-network" style="background-color: #1cb7ec; color: #fff;" href="http://twitter.com/share?url={{ $item->url_url }}" data-toggle="tooltip" data-original-title="Chia sẻ lên Twitter"><i class="fa fa-twitter"></i></a>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  <button type="" id="idTest">Test</button>
  {!! view_paginate_buttons($url) !!}
</div>
