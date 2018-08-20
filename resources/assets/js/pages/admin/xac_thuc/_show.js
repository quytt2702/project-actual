$(function () {

  'use strict'

  console.log('Chi tiết xác thực page');

  $('body').on('click', '#btnDuyet', function () {
    console.log('Đã bấm [Duyệt]');
    const hash = window.location.href.match(/\/admin\/xac-thuc\/(.*)\/show$/)[1];

    axios.put(`/admin/xac-thuc/${hash}/duyet`)
      .then(res => {
        displayMessage(res);
        console.log('window.location = "' + window.location.origin  + '/admin/xac-thuc'+ '"');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnKhongDuyet', function () {
    console.log('Đã bấm [Không duyệt]');

    const hash = window.location.href.match(/\/admin\/xac-thuc\/(.*)\/show$/)[1];

    const payload = {
      li_do_khong_duyet: $('#li_do_khong_duyet').val(),
    };

    axios.put(`/admin/xac-thuc/${hash}/khong-duyet`, payload)
      .then(res => {
        displayMessage(res);
        setTimeout('window.location = "' + window.location.origin  + '/admin/xac-thuc'+ '"', 1000);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnCancel').on('click', function () {
    history.go(-1);
  });

});
