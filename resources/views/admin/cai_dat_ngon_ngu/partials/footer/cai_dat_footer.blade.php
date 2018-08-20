<div class="col-md-12 m-t-20" style="border-top: 1px solid #ddd;">
  <h3>Cài đặt thông số footer</h3>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label>Tiêu đề</label>
      <input type="text" id="tieu_de_footer" class="form-control" placeholder="Tiêu đề" value="{{ $caiDatNgonNgu->tieu_de_footer }}">
    </div>
    <div class="form-group">
      <label>Link tiêu đề (Nếu có)</label>
      <input type="text" id="link_tieu_de_footer" class="form-control url_search" placeholder="Link tiêu đề" value="{{ $caiDatNgonNgu->link_tieu_de_footer }}">
    </div>
    <div class="form-group">
      <label>Mô tả ngắn</label>
      <input type="text" id="mo_ta_ngan_footer" class="form-control" placeholder="Mô tả ngắn" value="{{ $caiDatNgonNgu->mo_ta_ngan_footer }}">
    </div>
    <div class="form-group">
      <label>Số điện thoại</label>
      <input type="text" id="sdt_footer" class="form-control" placeholder="Số điện thoại" value="{{ $caiDatNgonNgu->sdt_footer }}">
    </div>
    <div class="form-group">
      <label>Địa chỉ</label>
      <input type="text" id="dia_chi_footer" class="form-control" placeholder="Địa chỉ" value="{{ $caiDatNgonNgu->dia_chi_footer }}">
    </div>
    <div class="form-group">
      <button id="btnLuuFooter" class="btn btn-primary">Lưu</button>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Tiêu đề Menu 01</label>
      <input type="text" id="tieu_de_menu_01_footer" class="form-control" placeholder="Tiêu đề Menu 01" value="{{ $caiDatNgonNgu->tieu_de_menu_01_footer }}">
    </div>
    <div class="form-group">
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
              <td><input id="ten_hien_thi_menu_01_footer" class="form-control"></td>
              <td><input id="url_menu_01_footer" class="form-control url_search"></td>
              <td class="text-center"><button class="btn btn-circle btn-outline btn-success btnThemNoiDungFooter" data-code="1">+</button></td>
            </tr>
          </thead>
          <tbody id="noi_dung_menu_01_body">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label>Tiêu đề Menu 02</label>
      <input type="text" id="tieu_de_menu_02_footer" class="form-control" value="{{ $caiDatNgonNgu->tieu_de_menu_02_footer }}">
    </div>
    <div class="form-group">
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
              <td><input id="ten_hien_thi_menu_02_footer" class="form-control"></td>
              <td><input id="url_menu_02_footer" class="form-control url_search"></td>
              <td class="text-center"><button class="btn btn-circle btn-outline btn-success btnThemNoiDungFooter" data-code="2">+</button></td>
            </tr>
          </thead>
          <tbody id="noi_dung_menu_02_body">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Tiêu đề Menu 03</label>
      <input type="text" id="tieu_de_menu_03_footer" class="form-control" value="{{ $caiDatNgonNgu->tieu_de_menu_03_footer }}">
    </div>
    <div class="form-group">
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
              <td><input id="ten_hien_thi_menu_03_footer" class="form-control"></td>
              <td><input id="url_menu_03_footer" class="form-control url_search"></td>
              <td class="text-center"><button class="btn btn-circle btn-outline btn-success btnThemNoiDungFooter" data-code="3">+</button></td>
            </tr>
          </thead>
          <tbody id="noi_dung_menu_03_body">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
