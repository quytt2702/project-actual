$(function () {

  'use strict'

  console.log('Save người dùng page');

  $('#btnSubmit').on('click', function () {
    const payload = {
      'email'             : $('#email').val(),
      'cmnd'              : $('#cmnd').val(),
      'so_tai_khoan'      : $('#so_tai_khoan').val(),
      'id_ngan_hang'      : $('#id_ngan_hang').val(),
      'ho_va_ten'         : $('#ho_va_ten').val(),
      'ngay_sinh'         : $('#ngay_sinh').val(),
      'gioi_tinh'         : $('input[name=gioiTinh]:checked', '#gioi_tinh').val(),
      'sdt'               : $('#sdt').val(),
      'facebook'          : $('#facebook').val(),
      'dia_chi_hien_tai'  : $('#dia_chi_hien_tai').val(),
      'dia_chi_cmnd'      : $('#dia_chi_cmnd').val(),
      'ten_chu_tai_khoan' : $('#ten_chu_tai_khoan').val(),
      'ten_chi_nhanh'     : $('#ten_chi_nhanh').val(),
      'password'          : $('#password').val(),
      'id_nhom_quyen'     : $('#id_nhom_quyen').val(),
    };
    console.log(payload);

    axios.post(`/admin/nguoi-dung`, payload)
    .then(res => {
      console.log(res);
      displayMessage(res);
    }).catch(err => {
      displayErrors(err);
    });

  });

  $('#btnCancel').on('click', function() {
    window.location = '/admin/nguoi-dung';
  });

});
