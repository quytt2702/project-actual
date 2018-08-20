$(function () {

  'use strict'

  console.log('Quản lý rút tiền');

  window.tab = 1;
  getQuanLyRutTienBody(window.tab);

  $('.li').on('click', function () {
    window.tab = $(this).val();

    getQuanLyRutTienBody(window.tab);
  });

  function getQuanLyRutTienBody(val) {
    axios.get(`/admin/quan-ly-rut-tien/table/${val}`)
      .then(res => {
        $('#quan_ly_rut_tien_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnHuyBo', function () {
    console.log('Đã bấm [btnHuyBo]');

    const id = $(this).data('code');

    axios.get(`/admin/quan-ly-rut-tien/${id}/get-huy-bo-modal`)
      .then(res => {
        $('#modal').html(res.data);
        $('#confirm_modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnDongY', function () {
    console.log('Đã bấm [btnDongY]');

    const id = $(this).data('code');

    axios.put(`/admin/quan-ly-rut-tien/${id}/dong-y`)
      .then(res => {
        getQuanLyRutTienBody();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnXacNhan', function () {
    console.log('Đã bấm [btnXacNhan]');

    const id = $('#code').val();

    const payload = {
      ly_do: $('#ly_do').val(),
    };

    axios.put(`/admin/quan-ly-rut-tien/${id}/huy-bo`, payload)
      .then(res => {
        getQuanLyRutTienBody(window.tab);
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });
});
