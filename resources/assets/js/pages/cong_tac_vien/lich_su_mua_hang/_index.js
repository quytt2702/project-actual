$(function () {

  'use strict'

  console.log('Trang lịch mua hàng');

  getLichSuMuaHang();

  function getLichSuMuaHang() {
    console.log('đang chạy trang [getLichSuMuaHang()]');

    axios.get('/cong-tac-vien/lich-su-mua-hang/table')
      .then(res => {
        $('#lich_su_mua_hang_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnViewDetail', function () {
    console.log('Đã bấm [btnViewDetail]')
    const code = $(this).attr('hash');

    axios.get(`/cong-tac-vien/lich-su-mua-hang/${code}/modal`)
      .then(res => {
        $('#viewDetail').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        console.log(url);
        getLichSuMuaHangPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getLichSuMuaHangPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#lich_su_mua_hang_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/lich-su-mua-hang/search/${input_search}`)
    .then(res => {
      $('#lich_su_mua_hang_body').html(res.data);
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
