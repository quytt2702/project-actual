<div class="link__wrapper form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2">Nội Dung</label>
    <div class="col-sm-10">
      <input name="data[{{ $section_name }}_{{ $sectionHash }}][links][content][]" class="form-control" placeholder="Nội Dung">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Liên Kết</label>
    <div class="col-sm-10">
      <input name="data[{{ $section_name }}_{{ $sectionHash }}][links][url][]" class="form-control" placeholder="Liên Kết">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 text-right">
      <button type="button" class="btn btn-danger btn-sm btn-rounded link-remover">
        <i class="fa fa-times"></i>
        <span>Xoá</span>
      </button>
    </div>
  </div>
</div>
