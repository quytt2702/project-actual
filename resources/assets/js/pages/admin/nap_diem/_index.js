$(function () {

  'use strict'

  console.log('Trang quản lý nạp điểm');

  $('#btnView').on('click', function () {
    const dotTaoMa = $('#danh_sach_dot_tao_ma_view').val();

    axios.get(`/admin/nap-diem/table/${dotTaoMa}`)
      .then(res => {
        $('#view_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnUpdate').on('click', function () {
    const dotTaoMa = $('#danh_sach_dot_tao_ma_update').val();

    const payload = {
      'so_diem': $('#so_diem_update').val(),
      'is_active': $('#is_active_update').val(),
    };

    console.log(payload);

    axios.put(`/admin/nap-diem/${dotTaoMa}`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnKichHoat', function () {
    console.log('Đã bấm [btnKichHoat]');

    var id = $(this).attr('hash');

    console.log(id);

    axios.put(`/admin/nap-diem/kich-hoat/${id}`)
      .then(res => {
        $('#btnView').click();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

});
