$(function () {

  'use strict'

  console.log('Trang hồ sơ - Cộng tác viên');

  $('body').on('click', '#btnCapNhatNganHang', function () {
    console.log('Đã bấm [btnCapNhatNganHang]');

    const payload = {
      'so_tai_khoan'      : $('#so_tai_khoan').val(),
      'ten_chi_nhanh'     : $('#ten_chi_nhanh').val(),
      'ten_chu_tai_khoan' : $('#ten_chu_tai_khoan').val(),
    };

    axios.put(`/cong-tac-vien/ho-so/ngan-hang/`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('#avatarUploader').dropify();

  $('body').on('click', '#openAvatarUploader', e => {
    e.preventDefault();

    $('#hoSoUploadAvatarDropify').modal('show');
  });

  $('body').on('click', '#btnChangePassowrd', function () {
    console.log('Đã bấm [btnChangePassowrd]');

    const payload = {
      'current_password'          : $('#current_password').val(),
      'new_password'              : $('#new_password').val(),
      'new_password_confirmation' : $('#new_password_confirmation').val(),
    };

    axios.put('/cong-tac-vien/ho-so/change-password', payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

});
