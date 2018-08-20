$(function () {

  'use strict'

  console.log('Trang link giới thiệu - Cộng tác viên');

  $('body').on('click', '#btnCopy', function () {
    console.log('Đã bấm [btnCopy]');

    window.copyToClipboard($('#link_gioi_thieu').val(), 'link giới thiệu');
  });

});
