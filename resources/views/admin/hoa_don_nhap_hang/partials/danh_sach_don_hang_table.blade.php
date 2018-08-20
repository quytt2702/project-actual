<table id="demo-foo-addrow" class="table m-t-30 contact-list footable-loaded footable" data-page-size="10">
  <thead>
    <tr>
      <th>Ngày tạo</th>
      <th>Người tạo</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hoaDonNhapHang as $item)
    <tr class="danh_sach_don_hang" hash="{{ $item->id }}">
      <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
      <td>{{ $item->hoa_don_nhap_hang_email_nguoi_tao }}</td>
      <td class="text-nowrap text-center">
        <i class="fa fa-pencil btnEdit m-r-5" data-code="{{ $item->id }}"></i>
        <i class="fa fa-ban btnDelete" data-code="{{ $item->id }}"></i>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
