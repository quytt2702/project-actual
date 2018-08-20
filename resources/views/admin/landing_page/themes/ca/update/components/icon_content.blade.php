@php
  $iconPicker = str_random();
@endphp

<div class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3">Biểu Tượng</label>
    <div class="col-sm-9">
      <div class="input-group">
        <input id="icon_picker_{{ $iconPicker }}" type="text" name="data[{{ $section->hash }}][icon_contents][icon][]" class="form-control icon-picker" placeholder="Chọn một biểu tượng" value="{{ @substr($iconContent->icon, 3) }}">
        <span class="input-group-addon">
          <i class="{{ $iconContent->icon }}"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Tiêu Đề</label>
    <div class="col-sm-9">
      <input type="text" name="data[{{ $section->hash }}][icon_contents][title][]" class="form-control" placeholder="Tiêu Đề" value="{{ $iconContent->title }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Content</label>
    <div class="col-sm-9">
      <textarea rows="3" class="form-control" name="data[{{ $section->hash }}][icon_contents][content][]" placeholder="Content">{{ $iconContent->content }}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 text-right">
      <button type="button" class="btn btn-danger btn-sm btn-rounded icon-content-remover">
        <i class="fa fa-times"></i>
        <span>Xoá</span>
      </button>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function () {
    $('#icon_picker_{{ $iconPicker }}').iconpicker();
    $('#icon_picker_{{ $iconPicker }}').on('iconpickerSelected', function (e) {
      $(this)
        .siblings('.input-group-addon')
        .find('i')
        .attr('class', 'fa ' + e.iconpickerValue);
    });
  });
</script>
