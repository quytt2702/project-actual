$(function () {

  'use strict'

  console.log('Trang chính sách ctv- Admin');

  $('#btnChange').on('click', function () {
    console.log('Đã bấm vào [btnChange]');

    const payload = {
      thuong_gioi_thieu_dang_ky         : $('#thuong_gioi_thieu_dang_ky').val(),
      phan_tram_thuong_doanh_thu_cap_1  : $('#phan_tram_thuong_doanh_thu_cap_1').val(),
      phan_tram_thuong_doanh_thu_cap_2  : $('#phan_tram_thuong_doanh_thu_cap_2').val(),
    };

    console.log(payload);

    axios.put('/admin/chinh-sach-ctv', payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnCancel').on('click', function () {
    history.go(-1);
  });

});
