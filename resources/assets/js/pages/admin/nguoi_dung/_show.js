$(function () {

  'use strict'

  console.log('Xem người dùng page');

  $('#btnEdit').on('click', function () {
    window.location = window.location.href.replace('show', 'edit');
  });

  $('#btnCancel').on('click', function() {
    window.location = '/admin/nguoi-dung';
  });
});
