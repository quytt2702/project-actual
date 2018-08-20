@extends('admin.layouts.master')
@section('master.title', 'Chi tiết lịch sử bài viết')
@section('master.content')
<script src="/cktemplate/ckeditor/ckeditor.js"></script>
<script src="/cktemplate/ckfinder/ckfinder.js"></script>
<link rel="stylesheet" href="/template/bootstrap/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="/template/bootstrap/dist/bootstrap-tagsinput.css">
<div class="row m-t-30">
  <div class="col-sm-9">
    <div class="white-box">
      <h3 class="box-title m-b-0">Chỉnh sửa bài viết</h3>
      <br>
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-md-12">Tiêu đề bài viết</label>
          <div class="col-md-12">
            <input id="tieu_de" class="form-control" placeholder="Nhập nội dung tiêu đề tại đây" value="{{ $lichSuBaiViet->tieu_de }}" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Link bài viết</label>
          <div class="col-md-12">
            <div class="input-group">
              <input id="link" class="form-control" placeholder="Dữ liệu được sinh từ tiêu đề" disabled value="{{ $lichSuBaiViet->url }}" disabled>
              <span class="input-group-btn">
                <button id="edit_link" type="button" class="btn btn-success">Chỉnh sửa link bài viết</button>
                <button id="cancel_link" type="button" class="btn btn-default" style="display: none;">Huỷ bỏ</button>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Mô tả ngắn bài viết (SEO)</label>
          <div class="col-md-12">
            <textarea id="mo_ta_ngan" name="editor" class="form-control editor" rows="5" placeholder="Nhập nội dung mô tả ngắn tại đây">{{ $lichSuBaiViet->mo_ta_ngan }}</textarea disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Nội dung bài viết</label>
          <div class="col-md-12">
            <textarea id="noi_dung_bai_viet" class="form-control" rows="5" placeholder="Nhập nội dung chính của bài viết">{{ $lichSuBaiViet->noi_dung }}</textarea disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Từ khóa <i>(ngăn cách bằng dấu phẩy ",") </i></label>
          <div class="col-md-12">
            <input id="keyword" type="text" placeholder="Dấu phẩy hoặc tab" class="form-control" data-role="tagsinput" value="{{ $lichSuBaiViet->keyword }}" disabled>
          </div>
        </div>

        <div class="form-actions text-right">
          <button id="btnUpdate" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Chỉnh sửa bài viết</button>
          <button type="button" class="btn btn-default">Hủy bỏ</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="font-bold">Chuyên mục bài viết </a> </h4>
      </div>
      <div class="panel-body p-t-10">
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
          @php
            $index = 1;
            $chuyenMucArray = array_flip(json_decode($lichSuBaiViet->ten_chuyen_muc));
          @endphp
          @foreach($chuyenMuc as $item)
          <div class="checkbox checkbox-info">
            <input type="checkbox" name="chuyenMuc" class="checkbox" id="chk-ignore-case-{{ $index }}" value="{{ $item->ten_chuyen_muc }}" {{ array_key_exists($item->ten_chuyen_muc, $chuyenMucArray) ? 'checked':'' }}>
            <label for="chk-ignore-case-{{ $index++ }}">{{ $item->ten_chuyen_muc }}
              <p style="color: #4267b2; font-size:12px;"><i>Ngôn ngữ: {{ $item->ten }}</i></p>
            </label>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#headingThree" aria-expanded="true" aria-controls="headingThree" class="font-bold">Ảnh đại diện</a> </h4>
      </div>
      <div id="headingThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true" style="">
        <div class="panel-body" style="padding: 15px;">
          <img id="ckfinder-input-2" style="width: 100%" class="m-b-10" src="{{ $lichSuBaiViet->hinh_dai_dien }}" disabled>
          <button class="btn btn-primary btn-block" id="ckfinder-modal">Chọn ảnh đại diện</button>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="font-bold">Tags bài viết</a> </h4>
      </div>
      <div class="panel-body p-t-10">
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
            <input id="tags" type="text" placeholder="Dấu phẩy hoặc tab" class="form-control" data-role="tagsinput" value="{{ $lichSuBaiViet->tags }}" disabled>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/template/JQuery/jquery-3.3.1.js"></script>
@endsection
