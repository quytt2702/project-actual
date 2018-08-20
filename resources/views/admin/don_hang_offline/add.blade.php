@extends('admin.layouts.master')
@section('master.title', 'Tạo mới đơn hàng offline')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Tạo mới đơn hàng offline</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <h2>Thông tin khách hàng</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Họ và tên</label>
                <input type="text" id="ho_ten" class="form-control" placeholder="Họ và tên" value="Họ và tên">
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" id="email" class="form-control" placeholder="Email" value="Email">
              </div>
              <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <input type="text" id="sdt" class="form-control" placeholder="Số điện thoại" value="Số điện thoại">
              </div>
              <div class="form-group">
                <label class="control-label">Ghi chú</label>
                <input type="text" id="ghi_chu" class="form-control" placeholder="Ghi chú" value="Ghi chú">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-md-12">Thành phố</label>
                <select id="thanh_pho" class="form-control">
                  @foreach($tinhThanh as $item)
                  <option value='{{ $item->provinceid }}'>{{ "$item->type $item->name" }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-12">Quận</label>
                <select id="quan" class="form-control">
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-md-12">Phường</label>
                <select id="phuong" class="form-control">
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Đường</label>
                <input type="text" id="duong" class="form-control" placeholder="Đường" value="Đường">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h2>Danh sách sản phẩm</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th style="max-width: 100px;">Số lượng</th>
                      <th style="max-width: 100px;">Đơn giá</th>
                      <th style="max-width: 100px;">Phần trăm chiết khấu</th>
                      <th style="max-width: 100px;">Thành tiền</th>
                      <th>Hành động</th>
                    </tr>
                    <tr>
                      <td>
                        <input id="ten_san_pham" class="form-control" type="text">
                      </td>
                      <td style="max-width: 100px;">
                        <input id="so_luong" class="form-control" type="number">
                      </td>
                      <td style="max-width: 100px;">
                        <input id="don_gia" class="form-control" type="text" disabled>
                      </td>
                      <td style="max-width: 100px;">
                        <input id="phan_tram_chiet_khau" class="form-control" value="0" type="number">
                      </td>
                      <td style="max-width: 100px;">
                        <input id="thanh_tien" class="form-control" type="text" disabled>
                      </td>
                      <td class="text-center">
                        <button id="btnAdd" type="button" class="btn btn-success btn-rounded">+</button>
                      </td>
                    </tr>
                  </thead>
                  <tbody id="san_pham_table">
                  </tbody>
                </table>
                <button id="btnThemDonHang" class="btn btn-primary">Thêm đơn hàng</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
