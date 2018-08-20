$(function () {

  'use strict'

  console.log('Quản lý người dùng page');

  window.page = 1;

  getNguoiDung();

  async function getNguoiDung() {
    console.log('Đang chạy getNguoiDung()');

    $('#icon-refresh-bank').css('visibility', 'visible');

    axios.get(`/admin/nguoi-dung/table?page=${window.page}`)
      .then(res => {
        $('#nguoi_dung_body').html(res.data);
        $('#icon-refresh-bank').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-bank').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.delete', function () {
    var txid = $(this).attr('txid');

    axios.delete(`/admin/nguoi-dung/${txid}/delete`)
      .then(res => {
        getNguoiDung();
        console.log(res);
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });
  $('body').on('click', '#btnSearch', function() {
    var input_search = $('#input_search').val();

    axios.get(`/admin/nguoi-dung/search/${input_search}`)
      .then(res => {
        $('#nguoi_dung_body').html(res.data);
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
        getNguoiDungPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getNguoiDungPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#nguoi_dung_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
