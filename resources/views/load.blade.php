<div id="load" style="position: relative;" class="table-responsive">
  @if (count($tinh_thanh) > 0)
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <td>#</td>
        <td>Tên tỉnh thành</td>
      </tr>
    </thead>
    <tbody>
      @php
      $index = 1;
      @endphp
      @foreach($tinh_thanh as $item)
      <tr>
        <td>{{ $index++ }}</td>
        <td>{{ $item->ten_tinh_thanh }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h3>Ko có gì</h3>
  @endif
</div>
{{ $tinh_thanh->links() }}
</div>
