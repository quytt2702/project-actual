$(function () {

  'use strict'

  console.log('Trang tôi giới thiệu - Cộng tác viên');

  var option = "1";

  window.page = 1;

  getCongTacVien();

  async function getCongTacVien() {
    console.log('Đang chạy getCongTacVien()');

    axios.get(`/cong-tac-vien/dai-ly-cua-toi/${option}/table?page=${window.page}`)
      .then(res => {
        console.log(res.data);
        $('#toi_gioi_thieu_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
    });

  }

  $('.tab').on('click', function () {
    option = $(this).attr('value');
    getCongTacVien();
    console.log('Đã chọn option: ' + option);
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/dai-ly-cua-toi/search/${input_search}`)
      .then(res => {
        $('#toi_gioi_thieu_table').html(res.data);
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
        getDaiLyCuaToi(url);
        // window.history.pushState("", "", url);
    });

    function getDaiLyCuaToi(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#toi_gioi_thieu_table').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
