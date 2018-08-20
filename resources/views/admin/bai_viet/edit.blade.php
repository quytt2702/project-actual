@extends('admin.layouts.master')
@section('master.title', 'Chỉnh sửa bài viết')
@section('master.content')
<script src="/template/JQuery/jquery-3.3.1.js"></script>
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
            <input id="tieu_de" class="form-control" placeholder="Nhập nội dung tiêu đề tại đây" value="{{ $baiViet->tieu_de }}">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Link bài viết</label>
          <div class="col-md-12">
            <div class="input-group">
              <input id="link" class="form-control" placeholder="Dữ liệu được sinh từ tiêu đề" disabled value="{{ $baiViet->url }}">
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
            <textarea id="mo_ta_ngan" name="editor" class="form-control editor" rows="5" placeholder="Nhập nội dung mô tả ngắn tại đây">{{ $baiViet->mo_ta_ngan }}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Nội dung bài viết</label>
          <div class="col-md-12">
            <textarea id="noi_dung_bai_viet" class="form-control" rows="5" placeholder="Nhập nội dung chính của bài viết">{{ $baiViet->noi_dung }}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Từ khóa <i>(ngăn cách bằng dấu phẩy ",") </i></label>
          <div class="col-md-12">
            <input id="keyword" type="text" placeholder="Dấu phẩy hoặc tab" class="form-control" data-role="tagsinput" value="{{ $baiViet->keyword }}">
          </div>
        </div>

        <div class="form-actions text-right">
          <button id="btnUpdate" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Chỉnh sửa bài viết</button>
          <button id="btnCancel" type="button" class="btn btn-default">Hủy bỏ</button>
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
            $chuyenMucArray = array_flip(json_decode($baiViet->id_chuyen_muc));
          @endphp
          @foreach($chuyenMuc as $item)
          <div class="checkbox checkbox-info">
            <input type="checkbox" name="chuyenMuc" hash="{{ $item->chuyen_muc_id }}" class="checkbox" id="chk-ignore-case-{{ $index }}" value="{{ $item->ten_chuyen_muc }}" {{ array_key_exists($item->chuyen_muc_id, $chuyenMucArray) ? 'checked':'' }}>
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
          <img id="ckfinder-input-2" style="width: 100%" class="m-b-10" src="{{ $baiViet->hinh_dai_dien }}">
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
            <input id="tags" type="text" placeholder="Dấu phẩy hoặc tab" class="form-control" data-role="tagsinput" value="{{ $baiViet->tags }}">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('master.js')
<!-- Wysuhtml5 Plugin JavaScript -->
<script src="/template/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="/template/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
@endsection
