$(function () {

  'use strict'

  console.log('Lịch sử thưởng đơn hàng');

  window.page = 1;

  getThuongDonHang();

  function getThuongDonHang() {
    console.log('Đang chạy getThuongDonHang()');

    axios.get(`/cong-tac-vien/lich-su-thuong-don-hang/table?page=${window.page}`)
      .then(res => {
        $('#lich_su_thuong_don_hang_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();

    var url = $(this).attr('href');
    window.page = window.getPageFromUrl(url);
    console.log(url);
    getThuongDonHangPaginate(url);
  });

  function getThuongDonHangPaginate(url) {
    axios.get(url)
      .then(res => {
        console.log(res.data);
        $('#lich_su_thuong_don_hang_body').html(res.data);
      }).catch(err => {
      });
  }
});
