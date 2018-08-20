$(function () {

  'use strict'

  console.log('Trang người dùng liên kết');

  window.page = 1;

  getNguoiDungLienKet();

  function getNguoiDungLienKet() {
    console.log('Đang chạy getNguoiDungLienKet()');

    axios.get(`/cong-tac-vien/nguoi-dung-lien-ket/table?page=${window.page}`)
      .then(res => {
        $('#nguoi_dung_lien_ket_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/nguoi-dung-lien-ket/search/${input_search}`)
      .then(res => {
        $('#nguoi_dung_lien_ket_body').html(res.data);
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
        getNguoiDungLienKetPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getNguoiDungLienKetPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#nguoi_dung_lien_ket_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
