<div class="panel panel-info block4" style="position: static; zoom: 1;">
  <div class="panel-heading"> {{ $section->ten }}
    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
  </div>
  <div class="panel-wrapper collapse in" aria-expanded="true">
    <div class="panel-body">
      <input type="hidden" name="data[{{ $strRandom }}][section_id]" value="{{ $section->id }}">
      <input type="hidden" name="data[{{ $strRandom }}][section_ten]" value="{{ $section->ten }}">
      <input type="hidden" name="data[{{ $strRandom }}][section_the_loai]" value="{{ $section->type }}">
      {{-- Kiểu sản phẩm --}}
      @if($section->type == 1)
      <div class="form-group">
        <label>Tên hiển thị</label>
        <input type="text" class="form-control" name="data[{{$strRandom}}][ten_view]">
      </div>

      <div class="form-group">
        <label>Chọn chuyên mục sản phẩm</label>
        @foreach($chuyenMucSanPham as $item)
        <div class="checkbox checkbox-success">
          <input id="checkbox_{{ $strRandom }}_{{$item->id}}" type="checkbox" name="data[{{$strRandom}}][danh_sach_chuyen_muc][{{$item->id}}]">
          <label for="checkbox_{{ $strRandom }}_{{$item->id}}"> {{ $item->chuyen_muc_san_pham_ten }} </label>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label>Chọn kiểu sắp xếp</label>
        <select name="data[{{$strRandom}}][kieu_sap_xep]" class="form-control">
          <option value="1">Theo giá tăng dần</option>
          <option value="2">Theo giá giảm dần</option>
          <option value="3">Theo ngày đăng tăng dần</option>
          <option value="4">Theo ngày đăng giảm dần</option>
        </select>
      </div>
      <div class="form-group">
        <label>Số lượng sản phẩm: </label>
        <input type="number" name="data[{{$strRandom}}][so_luong_post]" class="form-control" value="{{ $section->number_post }}">
      </div>

      <input type="hidden" name="data[{{$strRandom}}][is_html]" value="{{ $section->is_html }}">
      @if ($section->is_html === 'YES')
      <div class="form-group" name="data[{{$strRandom}}][noi_dung_html]">
        <textarea id="data[{{$strRandom}}][noi_dung_html]" name="data[{{$strRandom}}][noi_dung_html]"></textarea>
      </div>
      <script>
        CKEDITOR.replace('data[{{$strRandom}}][noi_dung_html]',
        {
          filebrowserBrowseUrl      : '/cktemplate/ckfinder/ckfinder.html',
          filebrowserImageBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Images',
          filebrowserFlashBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Flash',
          filebrowserUploadUrl      : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          filebrowserImageUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
          filebrowserFlashUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
      </script>
      @endif

      <input type="hidden" name="data[{{$strRandom}}][is_slide]" value="{{ $section->is_slide }}">
      @if($section->is_slide === 'YES')
        <div class="form-group">
          <label>Chọn chuyên mục sản phẩm</label>
          @foreach($chuyenMucSanPham as $item)
            <div class="checkbox checkbox-success">
              <input id="checkbox_{{ $strRandom }}_{{$item->id}}_slide" type="checkbox" name="data[{{$strRandom}}][danh_sach_slide][{{ $item->id }}]">
              <label for="checkbox_{{ $strRandom }}_{{$item->id}}_slide"> {{ $item->chuyen_muc_san_pham_ten }} </label>
            </div>
          @endforeach
        </div>
      @endif

      @elseif($section->type == 2)
        <div class="form-group">
          <label>Tên hiển thị</label>
          <input type="text" name="data[{{ $strRandom }}][ten_view]" class="form-control">
        </div>

        <div class="form-group">
          <label>Chọn chuyên mục bài viết</label>
          @foreach($chuyenMucBaiViet as $item)
            <div class="checkbox checkbox-success">
              <input id="checkbox_{{ $strRandom }}_{{$item->id}}" type="checkbox" name="data[{{$strRandom}}][danh_sach_chuyen_muc][{{ $item->id }}]">
              <label for="checkbox_{{ $strRandom }}_{{$item->id}}"> {{ $item->ten_chuyen_muc }} </label>
            </div>
          @endforeach
        </div>

        <div class="form-group">
          <label>Chọn kiểu sắp xếp</label>
          <select name="data[{{ $strRandom }}][kieu_sap_xep]" class="form-control">
            <option value="1">Theo ngày đăng tăng dần</option>
            <option value="2">Theo ngày đăng giảm dần</option>
            <option value="3">Random sản phẩm</option>
          </select>
        </div>

        <div class="form-group">
          <label>Số lượng bài viết</label>
          <input type="number" name="data[{{ $strRandom }}][so_luong_post]" class="form-control">
        </div>
      @endif
    </div>
  </div>
</div>

