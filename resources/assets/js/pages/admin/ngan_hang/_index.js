$(function () {

  'use strict'

  getNganHang();

  async function getNganHang() {
    console.log('Đang chạy getNganHang()');

    $('#icon-refresh-bank').css('visibility', 'visible');

    axios.get('/admin/ngan-hang/table')
      .then(res => {
        $('#ngan-hang-body').html(res.data);
        $('#icon-refresh-bank').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-bank').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '#btnAdd', function() {
    console.log('Đã bấm [btnAdd]');

    const payload = {
      'ten_ngan_hang' : $('#ten-ngan-hang').val()
    };

    axios.post('/admin/ngan-hang', payload)
      .then(res => {
        $('#ten-ngan-hang').val('');
        displayMessage(res);
        getNganHang();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnCancel', function () {
    $('#ten-ngan-hang').val('');
  });

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const txid = $(this).attr('txid');

    axios.delete(`/admin/ngan-hang/${txid}`)
      .then(res => {
        displayMessage(res);
        getNganHang();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const txid = $(this).attr('txid');

    axios.get(`/admin/ngan-hang/${txid}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const txid = $('#idNganHang').val();

    const payload = {
      'ten_ngan_hang' : $('#tenNganHang').val()
    };

    axios.put(`/admin/ngan-hang/${txid}`, payload)
      .then(res => {
        getNganHang();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
