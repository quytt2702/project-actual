$(function () {
  'use strict'

  console.log('Trang khách hàng - Landing Page');

  loadData();

  function loadData() {
    console.log('Đang chạy [loadData]')

    axios.get('/admin/landing-page/khach-hang-landing-page/table')
      .then(res => {
        $('#table-body-khach-hang').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.pagination a', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');
    getPaginate(url);
  })

  function getPaginate(url)
  {
    console.log('chay [getPaginate]');

    axios.get(url)
      .then(res => {
        $('#table-body-khach-hang').html(res.data);
      }).catch(err => {
        displayErrors(err);
      })
  }
})
