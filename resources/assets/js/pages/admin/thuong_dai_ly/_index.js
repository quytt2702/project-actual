$(function () {
  'use strict'

  console.log('Thưởng đại lý - Admin');

  $('#btnXem').on('click', function () {
    console.log('Đã bấm [btnXem]');

    var thang = $('#thang').val();
    var nam   = $('#nam').val();

    axios.get(`/admin/thuong-dai-ly/xem/${thang}/${nam}`)
      .then(res => {
        console.log(res.data.refresh);
        if (res.data.refresh) {
          window.location.reload();
        } else {
          $('#quan_ly_thuong_dai_ly_table').html(res.data.view);
        }
      }).catch(err => {
        displayErrors(err);
    });

  });

  $('#btnTimKiem').on('click', function () {
    console.log('Đã bấm [btnTimKiem]');
    var content = $('#content').val();

    axios.get(`/admin/thuong-dai-ly/tim-kiem/${content}`)
      .then(res => {
        $('#quan_ly_thuong_dai_ly_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
    });
  });

});
