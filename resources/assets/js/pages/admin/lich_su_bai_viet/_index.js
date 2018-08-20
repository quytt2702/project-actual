$(function () {

  'use strict'

  console.log('Trang lịch sử bài viết');

  getLichSuBaiViet();

  function getLichSuBaiViet() {
    console.log('Đang chạy getLichSuBaiViet()');

    const hash = window.location.href.match(/\/admin\/lich-su-bai-viet\/(.*)$/)[1];

    axios.get(`/admin/lich-su-bai-viet/${hash}/list`)
      .then(res => {
        $('#lich-su-bai-viet-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnChiTiet', function () {
    var id = $(this).attr('hash');

    window.location = window.location.origin + `/admin/lich-su-bai-viet/${id}/show`;
  });

  $('body').on('click', '.btnKhoiPhuc', function () {
    var id = $(this).attr('hash');

    axios.post(`/admin/lich-su-bai-viet/${id}/restore`)
      .then(res => {
        displayMessage(res);
        getLichSuBaiViet();
      }).catch(err => {
        displayErrors(err);
      });
  });

});
