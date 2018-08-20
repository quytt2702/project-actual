$(function () {

  'use strict'

  console.log('Trang quản lý Log');

  getDataLog();

  function getDataLog() {
    console.log('Dang Chay [getDataLog()]');

    axios.get('/admin/log/table')
      .then(res => {
        $('#log_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();

    console.log(url);
    var url = $(this).attr('href');
    window.page = window.getPageFromUrl(url);
    getLogPaginate(url);
  });

  function getLogPaginate(url) {
    console.log('dang chay [getLogPaginate]');

    axios.get(url)
      .then(res => {
        $('#log_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }


});
