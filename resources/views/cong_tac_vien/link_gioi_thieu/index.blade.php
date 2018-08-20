@extends('cong_tac_vien.layouts.master')
@section('master.title', 'Link giới thiệu')
@section('master.content')
<div class="row m-t-30">
  <div class="col-sm-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Link giới thiệu</h3>
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div>
            <div class="form-group m-t-10">
              <div class="input-group">
                <input type="text" class="form-control" id="link_gioi_thieu" value="{{ $link }}" disabled>
                <div id="btnCopy" class="input-group-addon" style="color: white; background-color: #3498db; cursor: pointer;">Copy</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
