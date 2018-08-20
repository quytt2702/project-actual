$(function () {

  'use strict'

  console.log('Xem cộng tác viên page');

  $('#btnEdit').on('click', function () {
    window.location = window.location.href.replace('show', 'edit');
  });

  $('#btnCancel').on('click', function() {
    window.location = '/admin/cong-tac-vien/list'
  });
});
