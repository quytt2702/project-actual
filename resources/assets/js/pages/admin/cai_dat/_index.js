$(function () {

  'use strict'

  console.log('Trang cài đặt chung - Admin');

  $('#btnChange').on('click', function () {
    console.log('Đã bấm vào [btnChange]');

    const payload = {
      email                   : $('#email').val(),
      email_password          : $('#email_password').val(),
      so_lan_nap_sai_lien_tuc : $('#so_lan_nap_sai_lien_tuc').val(),
      don_hang_dau            : $('#don_hang_dau').val(),
      don_hang_sau            : $('#don_hang_sau').val(),
      phi_ship_ctv            : $('#phi_ship_ctv').val(),
      phi_ship_cod            : $('#phi_ship_cod').val(),
      phi_ship_ngan_luong     : $('#phi_ship_ngan_luong').val(),
    };

    console.log(payload);

    axios.put('/admin/cai-dat-chung', payload)
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
