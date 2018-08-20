$(function () {

  'use strict'

  console.log('Trang thêm nhân viên hệ thống');

  $('body').on('click', '#btnBack', function () {
    window.history.go(-1);
  });

  $('body').on('click', '#btnAdd', function() {
    console.log('Đã bấm [btnAdd]');

    const payload = {
      'email'                  : $('#email').val(),
      'ho_va_ten'              : $('#ho_va_ten').val(),
      'password'               : $('#mat_khau').val(),
      'password_confirmation'  : $('#mat_khau_confirmation').val(),
      'id_nhom_quyen'          : $('#nhom_quyen').val(),
    };

    axios.post('/admin/nhan-vien-he-thong', payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
