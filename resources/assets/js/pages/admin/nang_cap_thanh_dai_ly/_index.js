$(function () {

  'use strict'

  console.log('Nâng cấp thành đại lý');

  window.page = 1;

  getCongTacVien();

  async function getCongTacVien() {
    console.log('Đang chạy getCongTacVien()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get(`/admin/nang-cap-thanh-dai-ly/table?page=${window.page}`)
      .then(res => {
        $('#cong_tac_vien_body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.btnNangCap', function () {
    const email = $(this).attr('hash');

    axios.put(`/admin/nang-cap-thanh-dai-ly/${email}`)
      .then(res => {
        getCongTacVien();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
    });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/nang-cap-thanh-dai-ly/search/${input_search}`)
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
        getNangCapThanhDaiLy(url);
        // window.history.pushState("", "", url);
    });

    function getNangCapThanhDaiLy(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#cong_tac_vien_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
