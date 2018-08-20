@extends('admin.layouts.master')
@section('master.title', 'Phần trăm thưởng đại lý')
@section('master.content')
<div id="changeModal"></div>
<div class="row m-t-30">
  <div class="col-md-8">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Phần trăm thưởng đại lý
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead class="thead-inverse">
            <tr>
              <th class="text-center">#</th>
              <th>Mức yêu cầu dưới</th>
              <th>Mức yêu cầu trên</th>
              <th>Phần trăm thưởng</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="phan_tram_thuong_dai_ly_body">
            <tr>
              <td colpan="4">Không có dữ liệu</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm mục</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Mức yêu cầu dưới</label>
            <input type="text" class="form-control m-t-5" id="muc_yeu_cau_duoi" placeholder="Mục yêu cầu dưới">
          </div>
          <div class="form-group">
            <label>Mức yêu cầu trên</label>
            <input type="text" class="form-control m-t-5" id="muc_yeu_cau_tren" placeholder="Mục yêu cầu trên">
          </div>
          <div class="form-group">
            <label>Phần trăm thưởng</label>
            <input type="number" class="form-control m-t-5" id="phan_tram_thuong" placeholder="Phần trăm thưởng">
          </div>
          <button id="btnAdd" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
          <button id="btnCancel" class="btn btn-inverse waves-effect waves-light">Huỷ</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
