$(function () {

  'use strict'

  console.log('Trang chuyên mục sản phẩm');

  getChuyenMuc();

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

  $('body').on('click', '#chuyen_muc_san_pham_is_active_edit', function () {
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

  async function getChuyenMuc() {
    console.log('Đang chạy getChuyenMuc()');

    $('#icon-refresh').css('visibility', 'visible');

    axios.get('/admin/chuyen-muc-san-pham/table')
      .then(res => {
        console.log(res);
        $('#chuyen-muc-san-pham-body').html(res.data);
        $('#icon-refresh').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '#btnAdd', function () {
    console.log('Đã bấm [btnAdd]');

    const payload = {
      'chuyen_muc_san_pham_ten'         : $('#ten_chuyen_muc_san_pham').val(),
      'chuyen_muc_san_pham_url'         : $('#url').val(),
      'chuyen_muc_san_pham_id_ngon_ngu' : $('#id_ngon_ngu').val(),
      'chuyen_muc_san_pham_is_active'   : $('#is_active').html(),
    };

    axios.post(`/admin/chuyen-muc-san-pham`, payload)
      .then(res => {
        getChuyenMuc();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const hash = $(this).attr('hash');

    axios.delete(`/admin/chuyen-muc-san-pham/${hash}`)
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
    console.log(hash);

    axios.get(`/admin/chuyen-muc-san-pham/${hash}/edit-modal`)
      .then(res => {
        $('#changeModal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuu', function () {
    console.log('Đã bấm [btnLuu]');

    const hash = $('#id_chuyen_muc_san_pham').val();

    const payload = {
      'chuyen_muc_san_pham_ten'         : $('#chuyen_muc_san_pham_ten_edit').val(),
      'chuyen_muc_san_pham_url'         : $('#chuyen_muc_san_pham_url_edit').val(),
      'chuyen_muc_san_pham_is_active'   : $('#chuyen_muc_san_pham_is_active_edit').html(),
      'chuyen_muc_san_pham_id_ngon_ngu' : $('#chuyen_muc_san_pham_id_ngon_ngu_edit').val(),
    };

    axios.put(`/admin/chuyen-muc-san-pham/${hash}`, payload)
      .then(res => {
        getChuyenMuc();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
    });

  $('body').on('click', '#btnCancel', function () {
    $('#ten_chuyen_muc_san_pham').val('');
    $('#url').val('');
  });

});
