$(function () {

  'use strict'

  console.log('Trang sản phẩm tồn kho');

  loadData();

  function loadData() {
    console.log('Đang chạy [loadData]')
    axios.get('/admin/ton-kho/table')
      .then(res => {
        $('#san-pham-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      })
  }

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    getTonKhoPaginate(url);
  });

  function getTonKhoPaginate(url) {
    console.log('chay [getTonKhoPaginate]');
    axios.get(url)
      .then(res => {
        $('#san-pham-body').html(res.data);
      }).catch(err => {
        console.log(err);
      });
  }

  $('body').on('click', '#btnSearch', function() {
    console.log('click [btnSearch]');
    const search = $('#input_search').val();
    axios.get(`/admin/ton-kho/table/${search}`)
      .then(res => {
        $('#san-pham-body').html(res.data);
      }).catch(err => {
          displayErrors(err);
      })

  });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });
});
