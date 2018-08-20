$(function () {
  'use strict'

  console.log('Trang email marketing (Admin)');

  $('#btnCTVDaXacThuc').on('click', function () {
    window.location = window.location.origin + '/admin/email-marketing/cong-tac-vien/da-xac-thuc';
  });

  $('#btnCtvTatCa').on('click', function () {
    window.location = window.location.origin + '/admin/email-marketing/cong-tac-vien/tat-ca';
  });

  $('#btnDaiLy').on('click', function () {
    window.location = window.location.origin + '/admin/email-marketing/cong-tac-vien/dai-ly';
  });

  $('#btnKhachHang').on('click', function () {
    window.location = window.location.origin + '/admin/email-marketing/khach-hang';
  });

});
