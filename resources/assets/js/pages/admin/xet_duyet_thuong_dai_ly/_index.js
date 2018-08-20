$(function () {

  'use strict'

  console.log('Xét duyệt thưởng đại lý');

  window.status = 'tab_01';
  window.dai_ly = '';

  $('#btnThuong').on('click', function () {
    console.log('Đã bấm [btnThuong]');

    axios.post(`/admin/xet-duyet-thuong-dai-ly`)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
