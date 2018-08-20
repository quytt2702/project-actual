<div class="form-horizontal form-material">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-md-12">Số tài khoản</label>
        <div class="col-md-12">
          <input type="text" id="so_tai_khoan" placeholder="Số tài khoản" class="form-control form-control-line" value="{{ $user->so_tai_khoan }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-12">Tên chủ tài khoản</label>
        <div class="col-md-12">
          <input type="text" id="ten_chu_tai_khoan" placeholder="Tên chủ tài khoản" class="form-control form-control-line" value="{{ $user->ten_chu_tai_khoan }}">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-md-12">Tên chi nhánh</label>
        <div class="col-md-12">
          <input type="text" id="ten_chi_nhanh" placeholder="Tên chi nhánh" class="form-control form-control-line" value="{{ $user->ten_chi_nhanh }}">
        </div>
      </div>
      <div class="form-group">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
      <button id="btnCapNhatNganHang" class="btn btn-primary">Cập nhật</button>
    </div>
  </div>
</div>
