$(function () {

  'use strict'

  console.log('Chuyên mục bài viết page');

  $('#is_active').on('click', function () {
    if ($(this).html() === 'Active') {
      $(this).removeClass('btn-primary');
      $(this).addClass('btn-danger');
      $(this).html('Inactive');
    } else {
      $(this).removeClass('btn-danger');
      $(this).addClass('btn-primary');
      $(this).html('Active');
    }
  });

  $('body').on('click', '#is_active_edit', function () {
    if ($(this).html() === 'Active') {
      $(this).removeClass('btn-primary');
      $(this).addClass('btn-danger');
      $(this).html('Inactive');
    } else {
      $(this).removeClass('btn-danger');
      $(this).addClass('btn-primary');
      $(this).html('Active');
    }
  });

  getChuyenMuc();

  async function getChuyenMuc() {
    console.log('Đang chạy getChuyenMuc()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get('/admin/chuyen-muc-bai-viet/table')
      .then(res => {
        console.log(res);
        $('#chuyen-muc-body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '#btnAdd', function () {
    const payload = {
      'ten_chuyen_muc' : $('#ten_chuyen_muc').val(),
      'url'            : $('#url').val(),
      'id_ngon_ngu'    : $('#id_ngon_ngu').val(),
      'is_active'      : $('#is_active')[0].checked,
    };

    console.log(payload);

    axios.post('/admin/chuyen-muc-bai-viet', payload)
    .then(res => {
      $('#ten-chuyen-muc').val('');
      $('#url').val('');

      displayMessage(res);
      getChuyenMuc();
    }).catch(err => {
      displayErrors(err);
    });

  });

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const hash = $(this).attr('hash');

    axios.delete(`/admin/chuyen-muc-bai-viet/${hash}`)
      .then(res => {
        displayMessage(res);
        getChuyenMuc();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const hash = $(this).attr('hash');

    axios.get(`/admin/chuyen-muc-bai-viet/${hash}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const hash = $('#id-chuyen-muc').val();

    const payload = {
      'ten_chuyen_muc'  : $('#ten_chuyen_muc_edit').val(),
      'url'             : $('#url_edit').val(),
      'id_ngon_ngu'     : $('#id_ngon_ngu_edit').val(),
      'is_active'       : $("#is_active_edit"). prop("checked"),
    };

    console.log(payload);

    axios.put(`/admin/chuyen-muc-bai-viet/${hash}`, payload)
      .then(res => {
        getChuyenMuc();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnCancel').on('click', function () {
    $('#ten-chuyen-muc').val('');
    $('#url').val('');
  });

  $('body').on('click', '#btnCancel', function () {
    $('#ten_chuyen_muc_san_pham').val('');
  });

});
