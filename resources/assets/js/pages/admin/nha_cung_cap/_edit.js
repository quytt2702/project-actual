$(function () {

  'use strict'

  console.log('Trang sửa nhà cung cấp');

  $('#btnSubmit').on('click', function () {
    const hash = window.location.href.match(/\/admin\/nha-cung-cap\/(.*)\/edit$/)[1];

    var payload = {
      nha_cung_cap_ten            : $('#nha_cung_cap_ten').val(),
      nha_cung_cap_dia_chi        : $('#nha_cung_cap_dia_chi').val(),
      nha_cung_cap_phone_01       : $('#nha_cung_cap_phone_01').val(),
      nha_cung_cap_phone_02       : $('#nha_cung_cap_phone_02').val(),
      nha_cung_cap_is_active      : $('#nha_cung_cap_is_active').prop('checked'),
      nha_cung_cap_thong_tin_them : $('#nha_cung_cap_thong_tin_them').val(),
      hinh_anh                    : $('#img-avatar').attr('src'),
    };

    console.log(payload);

    axios.put(`/admin/nha-cung-cap/${hash}/update`, payload)
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

