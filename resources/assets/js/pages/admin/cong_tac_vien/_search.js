$(function () {

  'use strict'

  console.log('Tìm kiếm cộng tác viên page');

  $('#btnSearch').on('click', function () {
    var txt = $('#btnSearch').val();
    $('btnSearch').val("txt");
  });

});
