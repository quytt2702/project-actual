$(function () {

  'use strict'

  var ngon_ngu = $('#idNgonNgu').val();


  reloadAll();

  function reloadAll() {
    $('.row.m-t-30').block({
      message: null
    });
    getCaiDatNgonNgu();
    getMenuDoc();
    getMenuFooter(1);
    getMenuFooter(2);
    getMenuFooter(3);
    getSlider();
  }

  function getMenuFooter(menu) {
    console.log('Đang chạy [getMenuFooter]');

    axios.get(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/${menu}/noi-dung-footer`)
      .then(res => {
        if (menu == 1) {
          $('#noi_dung_menu_01_body').html(res.data);
        } else if (menu == 2) {
          $('#noi_dung_menu_02_body').html(res.data);
        } else {
          $('#noi_dung_menu_03_body').html(res.data);
        }
      }).catch(err => {
        displayErrors(err);
      });
  }

  function getMenuDoc() {
    console.log('Đang chạy [getMenuDoc]');

    axios.get(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/menu-doc`)
      .then(res => {
        $('#menu_doc_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  async function getCaiDatNgonNgu() {
    console.log('Đang chạy getCaiDatNgonNgu()');

    axios.get(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/table`)
      .then(res => {
        $('#cai-dat-ngon-ngu-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('.lang').on('click', function () {
    ngon_ngu = $(this).attr('value');
    $('#idNgonNgu').val(ngon_ngu);
    reloadAll();
    console.log('Đã chọn ngôn ngữ: ' + ngon_ngu);
  });

  $('body').on('click', '#btnChange', function () {
    console.log('Đã bấm vào [btnChange]');
    const payload = {
      tieu_de_trang_web : $('#tieu_de_trang_web').val(),
      hotline           : $('#hotline').val(),
      email             : $('#email').val(),
      sdt               : $('#sdt').val(),
      weibo             : $('#weibo').val(),
      chat_js           : $('#chat_js').val(),
      facebook          : $('#facebook').val(),
      google_plus       : $('#google_plus').val(),
      instagram         : $('#instagram').val(),
      youtube           : $('#youtube').val(),
      vimeo             : $('#vimeo').val(),
      twitter           : $('#twitter').val(),
      don_vi_tinh       : $('#don_vi_tinh').val(),
      don_vi_hien_thi   : $('#don_vi_hien_thi').val(),
      thuong_gioi_thieu : $('#thuong_gioi_thieu').val(),
      don_hang_dau      : $('#don_hang_dau').val(),
      don_hang_sau      : $('#don_hang_sau').val(),
      ti_gia_milk       : $('#ti_gia_milk').val(),
      logo_web          : $('#img-logo').attr('src'),
      loai_tieu_de_web  : $('#loai_tieu_de_web').val(),
    };

    console.log(payload);

    axios.put(`/admin/cai-dat-ngon-ngu/${ngon_ngu}`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        console.log(err);
        displayErrors(err);
      });
  });

  $('#btnCancel').on('click', function () {
    history.go(-1);
  });

  $('body').on('keyup', '.url_search', function () {
    var key = $(this).val();
    console.log('Đang search với từ khoá: ' + key);

    if (key == '') {
      return ;
    }

    axios.get(`/admin/cai-dat-ngon-ngu/${key}/search`)
      .then(res => {
        console.log(res.data);
        $(this).autocomplete({
          source: res.data
        });
      }).catch(err => {
        console.log(err);
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnThemMenuDoc', function () {
    const payload = {
      ten_hien_thi: $('#ten_hien_thi').val(),
      url_co_san: $('#url_co_san').val(),
    };

    console.log(payload);

    axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/menu-doc`, payload)
      .then(res => {
        getMenuDoc();
        displayMessage(res);
        $('#ten_hien_thi').val('');
        $('#url_co_san').val('');
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnXoaMenuDoc', function () {
    const code = $(this).data('code');

    axios.delete(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/${code}/xoa-menu-doc`)
      .then(res => {
        getMenuDoc();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuuFooter', function () {
    const payload = {
      tieu_de_footer: $('#tieu_de_footer').val(),
      link_tieu_de_footer: $('#link_tieu_de_footer').val(),
      mo_ta_ngan_footer: $('#mo_ta_ngan_footer').val(),
      sdt_footer: $('#sdt_footer').val(),
      dia_chi_footer: $('#dia_chi_footer').val(),
      tieu_de_menu_01_footer: $('#tieu_de_menu_01_footer').val(),
      tieu_de_menu_02_footer: $('#tieu_de_menu_02_footer').val(),
      tieu_de_menu_03_footer: $('#tieu_de_menu_03_footer').val(),
    }

    console.log(payload);
    axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/thong-so-footer`, payload)
      .then(res => {
        // getMenuDoc();
        displayMessage(res);
        // $('#ten_hien_thi').val('');
        // $('#url_co_san').val('');
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnThemNoiDungFooter', function () {
    console.log('Đã bấm [btnThemNoiDungFooter]');

    const code = $(this).data('code');
    var ten_hien_thi = '';
    var url = '';

    if (code == 1) {
      ten_hien_thi = $('#ten_hien_thi_menu_01_footer').val();
      url = $('#url_menu_01_footer').val();
    } else if (code == 2) {
      ten_hien_thi = $('#ten_hien_thi_menu_02_footer').val();
      url = $('#url_menu_02_footer').val();
    } else {
      ten_hien_thi = $('#ten_hien_thi_menu_03_footer').val();
      url = $('#url_menu_03_footer').val();
    }

    const payload = {
      ten_hien_thi: ten_hien_thi,
      url: url,
    }

    console.log(payload);

    axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/${code}/noi-dung-footer`, payload)
      .then(res => {
        getMenuFooter(code);
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnXoaMenuFooter', function () {
    console.log('Đang chạy [btnXoaMenuFooter]');

    const code = $(this).data('code');
    const url = $(this).data('url');

    axios.delete(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/${code}/${url}/xoa-menu-footer`)
      .then(res => {
        getMenuFooter(code);
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '#btnLuuMenuDoc', function () {
    const payload = {
      ten_menu_doc: $('#ten_menu_doc').val(),
    }

    axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/ten-menu-doc`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  function getSlider() {
    console.log('Đang chạy [getSlider]');
    axios.get(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/slider`)
    .then(res => {
      $('#slider_body').html(res.data);
      $('.row.m-t-30').unblock();
    }).catch(err => {
      displayErrors(err);
    });
  }

  $('body').on('click', '#btnAddSlider', function () {
    console.log('Đã chạy [btnAddSlider]');
    var urlImage = $('#ckfinder-input').attr('src');

    const payload = {
      ten_hien_thi : $('#ten_hien_thi_slider').val(),
      url_slider   : $('#url_slider').val(),
      image        : urlImage
    };

    axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/slider`, payload)
      .then(res => {
        getSlider();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnLuuIsSlider', function () {
    console.log('dang chay [btnLuuIsSlider]');

    const payload = {
      is_slider : $("#checkbox").prop('checked'),
    }

    axios.put(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/update-slider`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      })
  })

  $('body').on('click', '.btnXoaSlider', function () {
    console.log('Đang chạy [btnXoaMenuFooter]');
    const url_slider = $(this).attr('url_slider');

    axios.delete(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/${url_slider}/xoa-slider`)
    .then(res => {
      getSlider();
      displayMessage(res);
    }).catch(err => {
      displayErrors(err);
    });
  });

});
