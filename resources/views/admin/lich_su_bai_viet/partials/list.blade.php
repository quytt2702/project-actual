<div class="col-sm-12">
  <div class="form-horizontal">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>TIÊU ĐỀ</th>
            <th>LINK</th>
            <th>NỘI DUNG SỬA</th>
            <th>NGƯỜI SỬA</th>
            <th>NGÀY SỬA</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @if (empty($lichSuBaiViet) || count($lichSuBaiViet) === 0)
            <tr>
              <td colspan="7">
                Không có lịch sử
              </td>
            </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($lichSuBaiViet as $item)
          <tr>
            <td class="text-center">{{ $index++ }}</td>
            <td>{{ $item->tieu_de }}</td>
            <td class="text-primary">{{ env('APP_URL') . '/' . $item->url }}</td>
            <td>
              @if (substr($item->thay_doi, 0, 1) !== '[')
                <span class="label label-danger">{{ $item->thay_doi }}</span>
              @else
                @php
                  $thay_doi = json_decode($item->thay_doi, true);
                @endphp
                @foreach($thay_doi as $item_thay_doi)
                  <span class="label label-inverse">{{ $item_thay_doi }}</span>
                @endforeach
              @endif
            </td>
            <td>{{ $item->nguoi_tao }}</td>
            <td>{{ $item->nguoi_sua }}</td>
            <td class="text-center">
              <button class="btn btn-xs btn-danger btnChiTiet" hash="{{ $item->id }}">Xem chi tiết</button>
              <button class="btn btn-xs btn-success btnKhoiPhuc" hash="{{ $item->id }}">Khôi phục</button>
              <button class="btn btn-xs btn-warning btnXemTruoc" hash="{{ $item->id }}">Xem trước</button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
