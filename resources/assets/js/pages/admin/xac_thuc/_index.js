$(function () {

  'use strict'

  console.log('Trang xác thực');

  window.page = 1;

  getXacThuc();

  async function getXacThuc() {
    console.log('Đang chạy getXacThuc()');

    $('#icon-refresh-bank').css('visibility', 'visible');

    axios.get(`/admin/xac-thuc/table?page=${window.page}`)
      .then(res => {
        $('#xac_thuc_body').html(res.data);
        $('#icon-refresh-bank').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-bank').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.btnChiTiet', function () {
    const hash = $(this).attr('hash');

    window.location = window.location.origin + `/admin/xac-thuc/${hash}/show`;
  });

  $('body').on('click', '.btnDuyet', function () {
    console.log('Đã bấm [btnDuyet]');
    const hash = $(this).attr('hash');

    axios.put(`/admin/xac-thuc/${hash}/duyet`)
      .then(res => {
        getXacThuc();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/xac-thuc/search/${input_search}`)
      .then(res => {
        $('#xac_thuc_body').html(res.data);
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
        getXacThucPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getXacThucPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#xac_thuc_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
