@extends('admin.layouts.master')
@section('master.title', 'Quản lý nạp điểm')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Cập nhật danh sách điểm</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row m-b-20">
            <div class="col-md-3">
              <select id="danh_sach_dot_tao_ma_update" class="form-control">
                @foreach($dot_tao_ma as $item)
                <option>{{ $item->dot_tao_ma }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
             <select id="so_diem_update" class="form-control">
              @foreach($soDiem as $item)
              <option value="{{ $item->so_diem }}">{{ $item->so_diem }} điểm, tương đương {{ $item->so_diem }} nghìn VND</option>
              @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select id="is_active_update" class="form-control">
                <option value="YES">Kích hoạt</option>
                <option value="NO">Không kích hoạt</option>
              </select>
            </div>
            <div class="col-md-2">
              <button id="btnUpdate" class="btn btn-primary">Update</button>
            </div>
          </div>
          <div id="table_nap_tien" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--  --}}
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">Xem danh sách điểm</div>
      <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
          <div class="row m-b-20">
            <div class="col-md-3">
              <select id="danh_sach_dot_tao_ma_view" class="form-control">
                @foreach($dot_tao_ma as $item)
                <option>{{ $item->dot_tao_ma }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <button id="btnView" class="btn btn-primary">Xem</button>
            </div>
          </div>
          <div id="view_table" class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
