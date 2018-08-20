@extends('admin.layouts.master')
@section('master.title', 'Số điểm nạp thẻ')
@section('master.content')
<div id="edit-modal"></div>
<div class="row m-t-30">
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-0">
        <i id="icon-refresh-bank" class="fa fa-refresh fa-spin pull-right" style="visibility: hidden; margin-right: 10px;"></i>
        Danh sách số điểm nạp thẻ
      </h3>
      <div class="m-t-20 table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Số điểm</th>
              <th>Nội dung</th>
              <th>Tình trạng</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody id="so-diem-body">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm điểm nạp thẻ</h3>
      <div class="row m-t-20">
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Số điểm</label>
            <input type="text" class="form-control m-t-5" id="so-diem" placeholder="Số điểm">
          </div>
          <div class="form-group">
            <label>Nội dung</label>
            <input type="text" class="form-control m-t-5" id="noi-dung" placeholder="Nội dung">
          </div>
          <button id="btnAdd" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
          <button id="btnCancel" class="btn btn-inverse waves-effect waves-light">Huỷ</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
