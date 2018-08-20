@extends('admin.layouts.master')
@section('master.title', 'Quản lý chuyên mục sản phẩm')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-7">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách chuyên mục sản phẩm
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-hover table-bordered table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Tên</th>
              <th>URL</th>
              <th>Ngôn ngữ</th>
              <th>Hoạt động</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="chuyen-muc-san-pham-body">
            <tr>
              <td colspan="6">Không có dữ liệu</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm chuyên mục</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Tên chuyên mục</label>
            <input type="text" class="form-control m-t-5" id="ten_chuyen_muc_san_pham" placeholder="Tên chuyên mục">
          </div>
          <div class="form-group">
            <label>URL</label>
            <input type="text" class="form-control m-t-5" id="url" placeholder="URL">
          </div>
          <div class="form-group">
            <label>Chọn ngôn ngữ</label>
            <select id="id_ngon_ngu" class="form-control m-t-5">
              @foreach ($ngonNgu as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Trạng thái</label>
            <button id="is_active" class="btn btn-primary btn-xs m-l-10">Active</button>
          </div>
          <button id="btnAdd" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
          <button id="btnCancel" class="btn btn-inverse waves-effect waves-light">Huỷ</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
