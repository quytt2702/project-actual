@extends('admin.layouts.master')
@section('master.title', 'Thêm mới cộng tác viên')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading"> Tạo mới cộng tác viên</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Họ và tên</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-user"></i></div>
                    <input type="text" class="form-control" id="ho_va_ten" placeholder="Họ và tên">
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-email"></i></div>
                    <input type="text" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input id="ngay_sinh" type="date" class="form-control datepicker" value="2017-06-01">
                </div>
              </div>
              <!--/span-->
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Phone/Số điện thoại</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-mobile"></i></div>
                    <input type="text" class="form-control" id="so_dien_thoai" placeholder="Phone/Số điện thoại">
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                 <label class="control-label">Facebook</label>
                 <div class="input-group">
                  <div class="input-group-addon"><i class="ti-facebook"></i></div>
                  <input type="text" class="form-control" id="facebook" placeholder="Facebook">
                </div>
              </div>
            </div>
            <!--/span-->
            <div class="col-md-4">
             <div class="form-group">
              <label class="control-label">Địa chỉ giao hàng</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                <input type="text" class="form-control" id="dia_chi_hien_tai" placeholder="Nhập vào địa chỉ">
              </div>
            </div>
          </div>
          <!--/span-->
        </div>
        <div class="row">
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Số CMND</label>
              <input type="text" id="cmnd" class="form-control" placeholder="Số CMND">
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Địa chỉ theo CMND</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                <input type="text" class="form-control" id="dia_chi_cmnd" placeholder="Nhập vào địa chỉ">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Số tài khoản ngân hàng</label>
              <input type="text" id="so_tai_khoan" class="form-control" placeholder="Số tài khoản ngân hàng">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tên chủ tài khoản</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-user"></i></div>
                <input type="text" class="form-control" id="ten_chu_tai_khoan" placeholder="Tên chủ tài khoản">
              </div>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label>Ngân hàng</label>
              <select class="form-control" id="id_ngan_hang">
                <option> -- Mời bạn chọn ngân hàng -- </option>
                @foreach($nganHang as $item)
                <option value="{{ $item->id }}">{{ $item->ten_ngan_hang }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tên chi nhánh</label>
              <input type="text" id="ten_chi_nhanh" class="form-control" placeholder="Số tài khoản ngân hàng">
            </div>
          </div>
        </div>
        <div class="row">
          <!--/span-->
          <div class="col-md-4">
            <form id="gioi_tinh" class="form-group">
              <label class="control-label">Giới tính</label>
              <div class="radio-list">
                <label class="radio-inline p-0">
                  <div class="radio radio-info">
                    <input type="radio" name="gioiTinh" id="radio1" value="Nam">
                    <label for="radio1">Nam</label>
                  </div>
                </label>
                <label class="radio-inline">
                  <div class="radio radio-info">
                    <input type="radio" name="gioiTinh" id="radio2" value="Nữ">
                    <label for="radio2">Nữ</label>
                  </div>
                </label>
              </div>
            </form>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Password</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-lock"></i></div>
                <input type="text" class="form-control" id="password" placeholder="Nhập Password/Mật khẩu">
              </div>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label>Quyền hạn</label>
              <select class="form-control" id="id_quyen">
                <option> -- Mời bạn nhóm quyền -- </option>
                @foreach ($nhomQuyen as $item)
                <option value="{{ $item->id }}">{{ $item->ten_nhom }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-actions text-right">
          <button id="btnSubmit" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Thêm người dùng</button>
          <button id="btnCancel" type="button" class="btn btn-default">Hủy bỏ</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
