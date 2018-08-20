$(function () {
  'use strict'

  console.log('Trang điều khoản và hợp đồng ctv (chỉnh sửa)');

  CKEDITOR.replace('noi_dung',
  {
    filebrowserBrowseUrl      : '/cktemplate/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/cktemplate/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl      : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/cktemplate/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  });

  $('#btnUpdate').on('click', function () {
    var payload = {
      url_noi_dung : CKEDITOR.instances.noi_dung.getData(),
    };

    console.log(payload);

    axios.put(`/admin/dieu-khoan-va-hop-dong-ctv`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnBack').on('click', function () {
    window.history.go(-1);
  });

});
