$(function () {

  'use strict'

  getNhomQuyen();

  async function getNhomQuyen() {
    console.log('Đang chạy getNhomQuyen()');

    $('#icon-refresh-rules').css('visibility', 'visible');

    axios.get('/admin/nhom-quyen/table')
      .then(res => {
        $('#nhom-quyen-body').html(res.data);
        $('#icon-refresh-rules').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-rules').css('visibility', 'hidden');
      });
  }

  $('body').on('click', '#btnAdd', function() {
    console.log('Đã bấm [btnAdd]');

    const payload = {
      'ten_nhom' : $('#ten-nhom').val(),
      'mo_ta' : $('#mo-ta').val()
    };

    axios.post('/admin/nhom-quyen', payload)
      .then(res => {
        $('#ten-nhom').val('');
        $('#mo-ta').val('');
        displayMessage(res);
        getNhomQuyen();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const txid = $(this).attr('txid');

    axios.delete(`/admin/nhom-quyen/${txid}`)
      .then(res => {
        displayMessage(res);
        getNhomQuyen();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const txid = $(this).attr('txid');

    axios.post(`/admin/nhom-quyen/${txid}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const txid = $('#idNhomQuyen').val();

    const payload = {
      'ten_nhom' : $('#tenNhom').val(),
      'mo_ta' : $('#moTa').val()
    };

    axios.put(`/admin/nhom-quyen/${txid}`, payload)
      .then(res => {
        getNhomQuyen();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnCancel', function () {
    $('#ten-nhom').val('');
    $('#mo-ta').val('');
  });

});
