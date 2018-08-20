$(function () {

  'use strict'

  getPhanTramThuong();

  console.log('Trang phần trăm thưởng đại lý')

  async function getPhanTramThuong() {
    console.log('Đang chạy getPhanTramThuong()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get('/admin/phan-tram-thuong-dai-ly/table')
      .then(res => {
        $('#phan_tram_thuong_dai_ly_body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '#btnAdd', function() {
    console.log('Đã bấm [btnAdd]');

    const payload = {
      'muc_yeu_cau_duoi' : $('#muc_yeu_cau_duoi').val(),
      'muc_yeu_cau_tren' : $('#muc_yeu_cau_tren').val(),
      'phan_tram_thuong' : $('#phan_tram_thuong').val(),
    };

    axios.post('/admin/phan-tram-thuong-dai-ly', payload)
      .then(res => {
        $('#ten-ngan-hang').val('');
        displayMessage(res);
        getPhanTramThuong();
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

    axios.delete(`/admin/phan-tram-thuong-dai-ly/${txid}`)
      .then(res => {
        displayMessage(res);
        getPhanTramThuong();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const txid = $(this).attr('txid');

    axios.get(`/admin/phan-tram-thuong-dai-ly/${txid}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const txid = $('#id').val();

    const payload = {
      'muc_yeu_cau_duoi' : $('#muc_yeu_cau_duoi').val(),
      'muc_yeu_cau_tren' : $('#muc_yeu_cau_tren').val(),
      'phan_tram_thuong' : $('#phan_tram_thuong').val(),
    };

    axios.put(`/admin/phan-tram-thuong-dai-ly/${txid}`, payload)
      .then(res => {
        getPhanTramThuong();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
