$(function () {

  'use strict'

  console.log('Trang quản lý nhân viên hệ thống');

  getNhanVienHeThong();

  async function getNhanVienHeThong() {
    console.log('Đang chạy getNhanVienHeThong()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get('/admin/nhan-vien-he-thong/table')
      .then(res => {
        $('#admin-body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const hash = $(this).attr('hash');

    axios.delete(`/admin/nhan-vien-he-thong/${hash}`)
      .then(res => {
        getNhanVienHeThong();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const hash = $(this).attr('hash');

    axios.post(`/admin/nhan-vien-he-thong/${hash}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const email = $('#email').val();

    const payload = {
      'ho_va_ten' : $('#ho_va_ten_edit').val(),
      'password'  : $('#mat_khau_edit').val(),
      'password_confirmation'  : $('#mat_khau_edit_confirmation').val(),
    };

    axios.put(`/admin/nhan-vien-he-thong/${email}`, payload)
      .then(res => {
        getNhanVienHeThong();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnBlock', function () {
    console.log('Đã bấm [btnBlock]');

    var hash = $(this).attr('hash');

    axios.put(`/admin/nhan-vien-he-thong/${hash}/block`)
      .then(res => {
        getNhanVienHeThong();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
