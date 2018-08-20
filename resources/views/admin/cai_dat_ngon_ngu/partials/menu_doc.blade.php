<div class="col-md-12 m-t-30" style="border-top: 1px solid #ddd;">
  <h3>Cài đặt menu dọc</h3>
  <div class="form-group">
    <label for="text" class="col-md-1 control-label m-t-10">Hiển thị</label>
    <div class="col-md-11">
      <div class="input-group">
        <input type="text" class="form-control item-menu" id="ten_menu_doc" placeholder="Tên hiển thị" value="{{ $caiDatNgonNgu->ten_menu_doc }}">
        <div class="input-group-btn">
          <button id="btnLuuMenuDoc" type="button" class="form-control btn-primary waves-effect waves-light" style="color: #fff;">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Tên hiển thị</th>
            <th>Link</th>
            <th class="text-center"></th>
          </tr>
          <tr>
            <td class="text-center">0</td>
            <td><input id="ten_hien_thi" class="form-control"></td>
            <td><input id="url_co_san" class="form-control url_search"></td>
            <td class="text-center"><button id="btnThemMenuDoc" class="btn btn-circle btn-outline btn-success">+</button></td>
          </tr>
        </thead>
        <tbody id="menu_doc_body">
        </tbody>
      </table>
    </div>
  </div>
</div>

