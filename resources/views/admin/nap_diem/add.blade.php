@extends('admin.layouts.master')
@section('master.title', 'Nạp điểm')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Nạp điểm</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm" />
            <span class="input-group-addon">
              <i id="btnSearch"  class="fa fa-search"> </i>
            </span>
          </div>
          <br>
          <div class="row m-b-20">
            <div class="col-md-3">
              <input id="so_luong_code" type="number" class="form-control" placeholder="Số lượng code (200)">
            </div>
            <div class="col-md-4">
             <select id="so_diem" class="form-control">
              @foreach($soDiem as $item)
              <option value="{{ $item->so_diem }}">{{ $item->so_diem }} điểm, tương đương {{ $item->so_diem }} nghìn VND</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <select id="is_active" class="form-control">
              <option value="YES">Kích hoạt</option>
              <option value="NO">Chưa kích hoạt</option>
            </select>
          </div>
          <div class="col-md-2">
            <button id="btnAdd" class="btn btn-primary">Thêm</button>
          </div>
        </div>
        <div id="table_nap_tien" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
