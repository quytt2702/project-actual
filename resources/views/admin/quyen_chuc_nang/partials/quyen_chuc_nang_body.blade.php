<div class="panel-group" role="tablist" aria-multiselectable="true">
  @php
  $index = 1;
  $nhomChucNang = '';
  @endphp
  @for($i = 0; $i < count($chucNang)-1;)
  @if ($chucNang[$i]->chuc_nang_ten_nhom !== $nhomChucNang)
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="panel{{ $index }}">
      <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}" class="font-bold">{{ $chucNang[$i]->chuc_nang_ten_nhom }}</a> </h4> </div>
      <div id="collapse{{$index++}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <table class="tablesaw table-bordered table-hover table tablesaw-swipe" data-tablesaw-mode="swipe" id="table-3109" style="">
            <thead>
              <tr>
                <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" class="tablesaw-cell-persist">Action</th>
                <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3">Tên</th>
              </tr>
            </thead>
            <tbody>
              @php
              $nhomChucNang = $chucNang[$i]->chuc_nang_ten_nhom;
              @endphp
              @while($i < count($chucNang) && $nhomChucNang === $chucNang[$i]->chuc_nang_ten_nhom)
              <tr>
                @php
                @endphp
                <td class="text-center">
                  <div class="checkbox checkbox-primary">
                    <input id="checkbox{{ $i }}" type="checkbox" class="checkboxes" name="options[]" value="{{ $chucNang[$i]->id }}" {{ in_array($chucNang[$i]->id, $quyenChucNang) ? 'checked':'' }}>
                    <label for="checkbox{{ $i }}"></label>
                  </div>
                </td>
                <td>{{ $chucNang[$i++]->chuc_nang_ten }}</td>
              </tr>
              @endwhile
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
    @endfor
  </div>
</div>
