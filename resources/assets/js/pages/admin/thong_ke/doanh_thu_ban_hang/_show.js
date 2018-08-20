$(function () {
  'use strict'

  console.log('Trang Chi tiet Bán Hàng');

  const hash = $('#thong_ke_doanh_thu_ban_hang_chi_tiet').attr('hash');

  loadData();

  function loadData () {
    console.log('dang chay [loadData]');
    axios.get(`/admin/thong-ke/doanh-thu-ban-hang/${hash}/show`)
      .then(res => {
        $('#thong_ke_doanh_thu_ban_hang_chi_tiet').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }
})
