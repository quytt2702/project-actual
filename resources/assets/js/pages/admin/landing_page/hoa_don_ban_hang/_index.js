$(function () {
  'use strict'
  console.log('Trang Hoá đơn bán hàng - Landing page');
  loadData();

  function loadData() {
    console.log('Đang chạy [loadData]')

    axios.get('/admin/landing-page/hoa-don-ban-hang/table')
      .then(res => {
        $('#table-body-hoa-don').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnDetail', function() {
    console.log('click btnDetail')
    const hash = $(this).attr('hash');
    axios.get(`/admin/landing-page/hoa-don-ban-hang/table/${hash}`)
      .then(res => {
        $('#modal-hoa-don').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });


  $('body').on('click', '.pagination a', function (e) {
    e.preventDefault()
    const url = $(this).attr('href');
    getPaginate(url);
  })

  function getPaginate(url)
  {
    console.log('chay [getPaginate]');

    axios.get(url)
      .then(res => {
        $('#table-body-hoa-don').html(res.data);
      }).catch(err => {
        displayErrors(err);
      })
  }

  $('body').on('click', '.btnIn', function() {
    console.log('Đã bấm [btnIn]');

    const txid = $(this).attr('txid');

    window.open(window.location.origin + '/admin/landing-page/hoa-don-ban-hang/' + txid + '/in');
  });
})
