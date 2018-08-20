@extends('admin.layouts.master')
@section('master.title', 'Chi tiết người dùng')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">Chi tiết người dùng</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        @if(empty($nguoi_dung))
          <h3 class="p-t-10 p-b-20 p-l-20">Không tìm thấy người dùng</h3>
        @else
        <div class="panel-body">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Họ và tên</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-user"></i></div>
                    <input type="text" class="form-control" id="ho_va_ten" placeholder="Họ và tên" value="{{ $nguoi_dung->ho_va_ten }}" disabled>
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-email"></i></div>
                    <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $nguoi_dung->email }}" disabled>
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input id="ngay_sinh" type="date" class="form-control datepicker" value="{{ substr($nguoi_dung->ngay_sinh, 0, 10) }}" disabled>
                </div>
              </div>
              <!--/span-->
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Số điện thoại</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="ti-mobile"></i></div>
                    <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" value="{{ $nguoi_dung->sdt }}" disabled>
                  </div>
                </div>
              </div>
              <!--/span-->
              <div class="col-md-4">
                <div class="form-group">
                 <label class="control-label">Facebook</label>
                 <div class="input-group">
                  <div class="input-group-addon"><i class="ti-facebook"></i></div>
                  <input type="text" class="form-control" id="facebook" placeholder="Facebook" value="{{ $nguoi_dung->facebook }}" disabled>
                </div>
              </div>
            </div>
            <!--/span-->
            <div class="col-md-4">
             <div class="form-group">
              <label class="control-label">Địa chỉ giao hàng</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                <input type="text" class="form-control" id="dia_chi_hien_tai" placeholder="Nhập vào địa chỉ" value="{{ $nguoi_dung->dia_chi_hien_tai }}" disabled>
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
              <input type="text" id="cmnd" class="form-control" placeholder="Số CMND" value="{{ $nguoi_dung->cmnd }}" disabled>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Địa chỉ theo CMND</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                <input type="text" class="form-control" id="dia_chi_cmnd" placeholder="Nhập vào địa chỉ" value="{{ $nguoi_dung->dia_chi_cmnd }}" disabled>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Số tài khoản ngân hàng</label>
              <input type="text" id="so_tai_khoan" class="form-control" placeholder="Số tài khoản ngân hàng" value="{{ $nguoi_dung->so_tai_khoan }}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tên chủ tài khoản</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="ti-user"></i></div>
                <input type="text" class="form-control" id="ten_chu_tai_khoan" placeholder="Tên chủ tài khoản" value="{{ $nguoi_dung->ten_chu_tai_khoan }}" disabled>
              </div>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label>Ngân hàng</label>
              <select class="form-control" id="id_ngan_hang" disabled>
                <option> -- Mời bạn chọn ngân hàng -- </option>
                @foreach($nganHang as $item)
                <option value="{{ $item->id }}"  {{ ($item->id === $nguoi_dung->id_ngan_hang) ? 'selected':'' }}>{{ $item->ten_ngan_hang }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tên chi nhánh</label>
              <input type="text" id="ten_chi_nhanh" class="form-control" placeholder="Số tài khoản ngân hàng" value="{{ $nguoi_dung->so_tai_khoan }}" disabled>
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
                    <input type="radio" name="gioiTinh" id="radio1" value="Nam" {{ ($nguoi_dung->gioi_tinh === 'Nam') ? 'checked':'' }} disabled>
                    <label for="radio1">Nam</label>
                  </div>
                </label>
                <label class="radio-inline">
                  <div class="radio radio-info">
                    <input type="radio" name="gioiTinh" id="radio2" value="Nữ" {{ ($nguoi_dung->gioi_tinh === 'Nữ') ? 'checked':'' }} disabled>
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
                <input type="text" class="form-control" id="password" placeholder="Mật khẩu" disabled>
              </div>
            </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
            <div class="form-group">
              <label>Quyền hạn</label>
              <select class="form-control" id="id_nhom_quyen" disabled>
                <option> -- Mời bạn nhóm quyền -- </option>
                @foreach ($nhomQuyen as $item)
                <option value="{{ $item->id }}"  {{ ($item->id === $nguoi_dung->id_nhom_quyen) ? 'selected':'' }}>{{ $item->ten_nhom }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-actions text-right">
          <button id="btnEdit" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Sửa người dùng</button>
          <button id="btnCancel" type="button" class="btn btn-default">Hủy bỏ</button>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
</div>
</div>
@endsection
