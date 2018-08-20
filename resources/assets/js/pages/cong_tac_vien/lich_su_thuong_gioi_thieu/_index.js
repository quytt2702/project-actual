$(function () {

  'use strict'

  console.log('Trang lịch sử thưởng giới thiệu');

  window.page = 1;

  getLichSuThuongGioiThieu();

  async function getLichSuThuongGioiThieu() {
    console.log('Đang chạy getLichSuThuongGioiThieu()');

    $('#icon-refresh-bank').css('visibility', 'visible');

    axios.get(`/cong-tac-vien/lich-su-thuong-gioi-thieu/table?page=${window.page}`)
      .then(res => {
        $('#lich_su_thuong_gioi_thieu_body').html(res.data);
        $('#icon-refresh-bank').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-bank').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/lich-su-thuong-gioi-thieu/search/${input_search}`)
      .then(res => {
        $('#lich_su_thuong_gioi_thieu_body').html(res.data);
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
        getLichSuThuongGioiThieuPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getLichSuThuongGioiThieuPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#lich_su_thuong_gioi_thieu_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
