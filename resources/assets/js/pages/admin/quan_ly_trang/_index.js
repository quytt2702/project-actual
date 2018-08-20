$(function () {

  'use strict'

  console.log('Quản lý trang - Admin');

  window.page = 1;

  getListPage();

  function getListPage() {
    console.log('Đang chạy [getListPage]');
    axios.get(`/admin/quan-ly-trang/table?page=${window.page}`)
      .then(res => {
        $('#list_page_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnHienThi', function () {
    console.log('Đã bấm [btnHienThi]');

    var code = $(this).data('code');
    console.log(code);

    axios.put(`/admin/quan-ly-trang/${code}/change-view`)
      .then(res => {
        displayMessage(res);
        getListPage();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/quan-ly-trang/search/${input_search}`)
      .then(res => {
        $('#list_page_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });

  $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        window.page = window.getPageFromUrl(url);
        console.log(url);
        getQuanLyTrangPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getQuanLyTrangPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#list_page_table').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

    $('body').on('click', '.btnDelete', function() {
      console.log('Đã bấm [btnDelete]');
      const hash = $(this).attr('hash');

      axios.delete(`/admin/quan-ly-trang/${hash}/destroy`)
          .then(res => {
            getListPage();
            displayMessage(res);
          }).catch(err => {
            displayErrors(err);
          });
    });

});
