<table id="demo-foo-addrow" class="table table-hover contact-list footable-loaded footable" data-page-size="10">
  <thead>
    <tr>
      @if ($trangThai == 'tab_02')
      <th>Quản lý bởi</th>
      @else
      <th>Action</th>
      @endif
      <th>Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($congTacVien as $item)
    <tr style="display: table-row;">
      @if ($trangThai == 'tab_01')
      <td class="text-center">
       <div class="checkbox checkbox-primary" style="margin: 0;">
        <input id="checkbox{{ $item->id }}" class="check" type="checkbox" hash="{{ $item->email }}">
        <label for="checkbox{{ $item->id }}"></label>
      </div>
      </td>
      @elseif ($trangThai == 'tab_02')
      <td>{{ $item->ho_va_ten_quan_ly }}</td>
      @else
      <td class="text-center">
       <div class="checkbox checkbox-primary" style="margin: 0;">
        <input id="checkbox{{ $item->id }}" class="check" type="checkbox" hash="{{ $item->email }}" checked>
        <label for="checkbox{{ $item->id }}"></label>
      </div>
      </td>
      @endif
      <td>{{ $item->ho_va_ten }}</td>
      <td>{{ $item->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
