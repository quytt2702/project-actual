$(function () {
  'use strict'

  console.log('Chọn trang chủ - Admin');

  window.page = 1;

  getUrls();

  function getUrls() {
    console.log('Đang chạy [getUrls]');

    axios.get(`/admin/chon-trang-chu/table?page=${window.page}`)
      .then(res => {
        $('#urls_table').html(res.data);
      }).catch(err => {
        // displayErrors(err);
      });
  }

  $('body').on('click', '.btnChon', function () {
    console.log('Đã bấm [btnChon]');

    const url = $(this).data('url');
    console.log('Đã chọn ' + url);

    axios.put(`/admin/chon-trang-chu/${url}`)
      .then(res => {
        getUrls();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/chon-trang-chu/search/${input_search}`)
    .then(res => {
      $('#urls_table').html(res.data);
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
        getUrlsPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getUrlsPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#urls_table').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
