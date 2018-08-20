$(function () {

  'use strict'

  console.log('Quản lý cộng tác viên page');

  window.page = 1;

  getCongTacVien();

  async function getCongTacVien() {
    console.log('Đang chạy getCongTacVien()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get(`/admin/cong-tac-vien/table?page=${window.page}`)
      .then(res => {
        $('#cong_tac_vien_body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.delete', function () {
    var txid = $(this).attr('txid');

    axios.delete(`/admin/cong-tac-vien/${txid}/delete`)
      .then(res => {
        getCongTacVien();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.login', function () {
    var txid = $(this).attr('txid');

    window.open(window.location.origin + `/admin/cong-tac-vien/${txid}/login`);
  });

  $('body').on('click', '.btnBlock', function() {
    var hash = $(this).attr('hash');

    swal({
      title: "Bạn đã chắc chắn chưa?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Có",
      cancelButtonText: "Không"
    },

    function(isConfirm) {
      if (isConfirm) {

        axios.put(`/admin/cong-tac-vien/${hash}/block`)
          .then(res => {
            getCongTacVien();
            displayMessage(res);
          }).catch(err => {
            displayErrors(err);
          });

      }

    });

  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/cong-tac-vien/search/${input_search}`)
      .then(res => {
        $('#cong_tac_vien_body').html(res.data);
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
        getCongTacVienPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getCongTacVienPaginate(url) {
      axios.get(url)
        .then(res => {
          $('#cong_tac_vien_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
