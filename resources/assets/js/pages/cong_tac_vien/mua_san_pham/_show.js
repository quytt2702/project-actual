$(function () {

  'use strict'

  console.log('Trang chi tiết mua sản phẩm - Cộng tác viên');

  $('#btnGioHang').on('click', function () {
    console.log('Đã bấm [btnGioHang]');

    const id = window.location.href.match(/\/cong-tac-vien\/mua-san-pham\/(.*)\/show$/)[1];
    console.log(id);

    const payload = {
      so_luong: 1,
    }

    axios.post(`/cong-tac-vien/mua-san-pham/${id}/mua-sam`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

    window.location = window.location.origin + '/cong-tac-vien/mua-san-pham';
  });

  $('#btnThanhToan').on('click', function () {
    console.log('Đã bấm [btnThanhToan]');

    const id = window.location.href.match(/\/cong-tac-vien\/mua-san-pham\/(.*)\/show$/)[1];
    console.log(id);

    const payload = {
      so_luong: 1,
    }

    axios.post(`/cong-tac-vien/mua-san-pham/${id}/mua-sam`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

    window.location = window.location.origin + '/cong-tac-vien/gio-hang';
  });

});
