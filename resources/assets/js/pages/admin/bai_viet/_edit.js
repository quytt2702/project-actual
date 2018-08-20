$(function () {

  'use strict'

  console.log('Trang sửa bài viết');

  window.link = '';

  $('#mo_ta_ngan').wysihtml5({
    'stylesheets': false
  });

  CKEDITOR.replace('noi_dung_bai_viet',
  {
    filebrowserBrowseUrl : '/cktemplate/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  });

  $('#tieu_de').on('keyup', function () {
    console.log('Đã tạo link bài viết');

    var title = $('#tieu_de').val();

    title = window.convertToSlug(title);

    $('#link').val(title);
  });

  $('#edit_link').on('click', function() {
    window.link = $('#link').val();
    console.log('click');

    if ($(this).text() == 'Chỉnh sửa link bài viết') {
      $(this).html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      var link = window.convertToSlug($('#link').val());
      $('#link').val(link);
      $(this).html('Chỉnh sửa link bài viết');
      $('#link').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }

  });

  $('#cancel_link').on('click', function () {
    $('#link').val(window.link);

    if ($('#edit_link').text() == 'Chỉnh sửa link bài viết') {
      $('#edit_link').html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      $('#edit_link').html('Chỉnh sửa link bài viết');
      $('#link').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }
  });

  $('body').on('click', '#btnUpdate', function () {
    console.log('Đã bấm [btnUpdate]');

    const hash = window.location.href.match(/\/admin\/bai-viet\/(.*)\/edit$/)[1];

    const chuyen_muc = JSON.stringify( $("input[name='chuyenMuc']:checked").map(function(){
      return this.value;
    }).get());

    const id_chuyen_muc = JSON.stringify( $("input[name='chuyenMuc']:checked").map(function(){
      return this.getAttribute('hash');
    }).get());

    var payload = {
      tieu_de           : $('#tieu_de').val(),
      url               : $('#link').val(),
      mo_ta_ngan        : $('#mo_ta_ngan').val(),
      noi_dung          : CKEDITOR.instances.noi_dung_bai_viet.getData(),
      keyword           : $('#keyword').val(),
      ten_chuyen_muc    : chuyen_muc,
      tags              : $('#tags').val(),
      hinh_dai_dien     : $('#ckfinder-input-2').attr('src'),
      id_chuyen_muc     : id_chuyen_muc,
    };

    console.log(payload);

    axios.put(`/admin/bai-viet/${hash}/update`, payload)
    .then(res => {
      displayMessage(res);
    }).catch(err => {
      displayErrors(err);
    });

  });

  // Chọn ảnh đại diện
  document.getElementById('ckfinder-modal').onclick = function() {
      selectFileWithCKFinder('ckfinder-input-2');
    };

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

          finder.on( 'file:choose:resizedImage', function( evt ) {
            var output = document.getElementById(elementId);
            output.src = evt.data.resizedUrl;
            document.getElementById('ckfinder-input-2').src = evt.data.resizedUrl;
          } );
        }
      });
    }

    $('#btnCancel').on('click', function () {
      history.go(-1);
    });

});
