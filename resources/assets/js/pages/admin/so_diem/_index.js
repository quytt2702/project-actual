$(function () {
  console.log('Đang ở trang số điểm');

  getData();

  function getData() {
    console.log('Dang chay [getData]')

    axios.get('/admin/so-diem/table')
      .then(res => {
        $('#so-diem-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      })
  }

  $('body').on('click', '#btnAdd', function() {
    console.log('click [btnAdd]');

    const payload = {
      noi_dung : $('#noi-dung').val(),
      so_diem  : $('#so-diem').val(),
    }

    axios.post('/admin/so-diem/store', payload)
      .then(res => {
        displayMessage(res);
        getData();
      }).catch(err => {
        displayErrors(err);
      })
      $('#btnCancel').click();
  });

  $('body').on('click', '#btnCancel', function () {
    $('#noi-dung').val('');
    $('#so-diem').val('');
  });

  $('body').on('click', '.btnKichHoat', function () {
    console.log('Da click [btnKichHoat]');
    const hash = $(this).attr('hash');

    axios.put(`/admin/so-diem/kick-hoat/${hash}`)
      .then(res => {
        displayMessage(res);
        getData();
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnDelete', function() {
    console.log('Da click [btnDelete]');
    const hash = $(this).attr('hash');

    axios.delete(`/admin/so-diem/destroy/${hash}`)
      .then(res => {
        displayMessage(res);
        getData();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Da click [btnEdit]');

    const hash = $(this).attr('hash');
    axios.get(`/admin/so-diem/edit/${hash}`)
      .then(res => {
        $('#edit-modal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      })
  })

  $('body').on('click', '#btnLuu', function() {
    console.log('Da click [btnLuu]');
    const hash = $(this).attr('hash');
    const payload = {
      so_diem   : $('#so-diem').val(),
      noi_dung  : $('#noi-dung').val(),
      kich_hoat : $("#kich_hoat").prop('checked'),
      id        : hash
    }
    console.log(payload);
    axios.put(`/admin/so-diem/update/${hash}`, payload)
      .then(res => {
        displayMessage(res);
        getData();
      }).catch(err => {
        displayErrors(err);
      })
  })
});
