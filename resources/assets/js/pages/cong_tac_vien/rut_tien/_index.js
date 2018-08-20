$(function () {

  'use strict'

  console.log('Rút tiên');

  getRutTienTable();

  function getRutTienTable() {
    console.log('Đang chạy getRutTienTable()');

    axios.get(`/cong-tac-vien/rut-tien/table`)
      .then(res => {
        $('#rut_tien_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('#btnRutTien').on('click', function () {
    console.log('Đã bấm [btnRutTien]');

    const payload = {
      so_tien: $('#so_tien_muon_rut').val(),
    };

    axios.post(`/cong-tac-vien/rut-tien`, payload)
      .then(res => {
        getRutTienTable();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnHuyBo', function () {
    console.log('Đã chạy [btnHuyBo]');

    const id = $(this).data('code');

    axios.delete(`/cong-tac-vien/rut-tien/${id}`)
      .then(res => {
        getRutTienTable();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });
});
