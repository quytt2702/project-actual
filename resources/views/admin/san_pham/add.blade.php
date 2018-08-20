@extends('admin.layouts.master')
@section('master.title', 'Thêm mới sản phẩm')
@section('master.content')
<script src="/cktemplate/ckeditor/ckeditor.js"></script>
<script src="/cktemplate/ckfinder/ckfinder.js"></script>
<link rel="stylesheet" href="/template/bootstrap/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="/template/bootstrap/dist/bootstrap-tagsinput.css">
<div class="row m-t-30">
  <div class="col-sm-9">
    <div class="white-box">
      <h3 class="box-title m-b-0">Thêm mới sản phẩm</h3>
      <br>
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-md-12">Mã sản phẩm</label>
          <div class="col-md-12">
            <input id="ma_san_pham" class="form-control" placeholder="Nhập mã sản phẩm tại đây">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-12">Tên sản phẩm</label>
          <div class="col-md-12">
            <input id="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm tại đây">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-12">Link sản phẩm</label>
          <div class="col-md-12">
            <div class="input-group">
              <input id="link" class="form-control" placeholder="Dữ liệu được sinh từ tiêu đề" disabled>
              <span class="input-group-btn">
                <button id="edit_link" type="button" class="btn btn-success">Chỉnh sửa link sản phẩm</button>
                <button id="cancel_link" type="button" class="btn btn-default" style="display: none;">Huỷ bỏ</button>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Giá bán khuyến mãi</label>
          <div class="col-md-4">
            <input id="gia_ban_khuyen_mai" class="form-control" type="number" placeholder="Giá bán khuyến mãi" style="text-decoration: line-through;">
          </div>
          <div class="col-md-8">
            <label id="gia_khuyen_mai_text" style="margin-top: 8px; font-weight: normal;">Không đồng</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Giá bán thực tế</label>
          <div class="col-md-4">
            <input id="gia_ban_thuc_te" class="form-control" type="number" placeholder="Giá bán thực tế">
          </div>
          <div class="col-md-8">
            <label id="gia_thuc_te_text" style="margin-top: 8px; font-weight: normal;">Không đồng</label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12">Mô tả sản phẩm</label>
          <div class="col-md-12">
            <textarea id="mo_ta_ngan" name="editor" class="form-control editor" rows="5" placeholder="Nhập nội dung mô tả ngắn tại đây"></textarea>
          </div>
        </div>

        <ul class="nav customtab nav-tabs" role="tablist">
          @php
            $index = 1;
          @endphp
          @foreach($tabs as $item)
            @if($item->is_open==='YES')
              <li role="presentation" class="{{ ($index === 1) ? 'active':'' }}">
                <a href="#tab{{$item->id}}" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="{{ ($index++ === 1) ? 'true':'false' }}" style="text-decoration: none;">
                  <span class="visible-xs"><i class="ti-home"></i></span>
                  <span class="hidden-xs">{{ $item->ten_tab }}</span>
                </a>
              </li>
            @endif
          @endforeach
        </ul>

        <div class="tab-content">
          @php
            $index = 1;
          @endphp
          @foreach($tabs as $item)
            @if($item->is_open==='YES')
              <div role="tabpanel" class="tab-pane fade {{ ($index === 1) ? 'active in':'' }}" id="tab{{$item->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea id="san_pham_noi_dung_tab_{{$index}}" {{ ($item->is_open === 'YES') ? '':'disabled' }} class="form-control" rows="5" placeholder="Nhập nội dung chính của sản phẩm"></textarea>
                    <script>
                      CKEDITOR.replace('san_pham_noi_dung_tab_{{ $index++ }}',
                      {
                        filebrowserBrowseUrl      : '/cktemplate/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Images',
                        filebrowserFlashBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl      : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                      });
                    </script>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            @endif
          @endforeach
        </div>

        <div class="form-group">
          <label class="col-md-12">Từ khóa</label>
          <div class="col-md-12">
            <input id="keyword" type="text" placeholder="Enter để thêm từ khoá" class="form-control" data-role="tagsinput">
          </div>
        </div>

        <div class="form-actions text-right">
          <button id="btnSubmit" type="submit" class="btn btn-info right"> <i class="fa fa-check"></i> Thêm mới sản phẩm</button>
          <button id="btnHuyBo" type="button" class="btn btn-default">Hủy bỏ</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="font-bold">Chuyên mục sản phẩm </a> </h4>
        @php
          $index = 1;
        @endphp
        @foreach($chuyenMucSanPham as $item)
          <div class="checkbox checkbox-info">
            <input type="checkbox" name="chuyenMucSanPham" class="checkbox chuyenMucSanPham" id="chk-ignore-case-{{ $index }}" value="{{ $item->id }}" id_ngon_ngu="{{ $item->ngon_ngu_id }}">
            <label for="chk-ignore-case-{{ $index++ }}">{{ $item->chuyen_muc_san_pham_ten }}
              <p style="color: #4267b2; font-size:12px;"><i>Ngôn ngữ: {{ $item->ten }}</i></p>
            </label>
          </div>
        @endforeach
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#headingThree" aria-expanded="true" aria-controls="headingThree" class="font-bold">Ảnh đại diện</a> </h4>
      </div>
      <div id="headingThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true" style="">
        <div class="panel-body" style="padding: 15px;">
          <img id="ckfinder-input-2" style="width: 100%" class="m-b-10">
          <button class="btn btn-primary btn-block" id="ckfinder-modal">Chọn ảnh đại diện</button>
        </div>
      </div>
    </div>

    <script>
      $('#ckfinder-modal').on('click', function () {
        selectFileWithCKFinder('ckfinder-input-2');
      });

      function selectFileWithCKFinder( elementId ) {
        CKFinder.modal( {
          chooseFiles: true,
          width: 800,
          height: 600,
          onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
              var file = evt.data.files.first();
              // var output = document.getElementById( elementId );
              // output.value = file.getUrl();
              document.getElementById('ckfinder-input-2').src = file.getUrl();
            } );

            finder.on('file:choose:resizedImage', function( evt ) {
              var output = document.getElementById(elementId);
              output.src = evt.data.resizedUrl;
              document.getElementById('ckfinder-input-2').src = evt.data.resizedUrl;
            } );
          }
        });
      }
    </script>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="font-bold">Tags sản phẩm</a> </h4>
      </div>
      <div class="panel-body p-t-10">
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
            <input id="tags" type="text" placeholder="Enter để thêm vào tags" class="form-control" data-role="tagsinput">
        </div>
      </div>
    </div>

  </div>
</div>

<script src="/template/JQuery/jquery-3.3.1.js"></script>

@endsection

@section('master.js')
<!-- Wysuhtml5 Plugin JavaScript -->
<script src="/template/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="/template/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
@endsection
