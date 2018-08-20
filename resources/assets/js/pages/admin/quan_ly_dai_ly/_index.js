$(function () {

  'use strict'

  console.log('Quản lý đại lý');

  window.page = 1;

  getDaiLy();

  async function getDaiLy() {
    console.log('Đang chạy getDaiLy()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get(`/admin/quan-ly-dai-ly/table?page=${window.page}`)
      .then(res => {
        $('#dai_ly_body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
      });
  }

  $('body').on('click', '.btnHuyQuyen', function () {
    const email = $(this).attr('hash');

    axios.put(`/admin/quan-ly-dai-ly/${email}`)
      .then(res => {
        getDaiLy();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/quan-ly-dai-ly/search/${input_search}`)
      .then(res => {
        $('#dai_ly_body').html(res.data);
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
        getDaiLyPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getDaiLyPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#dai_ly_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

});

