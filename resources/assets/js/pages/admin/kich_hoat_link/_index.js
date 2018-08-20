$(function () {
  'use strict'

  console.log('Trang kích hoạt link');

  window.Page = 1;

  getTable();

  function getTable() {
    console.log('Đang chạy [getTable]');

    axios.get(`/admin/kich-hoat-link/table?page=${window.page}`)
      .then(res => {
        $('#kich_hoat_link_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnThayDoi', function () {
    console.log('Đang chạy [btnThayDoi]');

    const code = $(this).data('code');
    axios.put(`/admin/kich-hoat-link/${code}/edit`)
      .then(res => {
        getTable();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        window.page = window.getPageFromUrl(url);
        console.log(url);
        getKichHoatLinkPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getKichHoatLinkPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#kich_hoat_link_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/kich-hoat-link/search/${input_search}`)
    .then(res => {
      $('#kich_hoat_link_body').html(res.data);
    }).catch(err => {
      displayErrors(err);
    });
  });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });
});
