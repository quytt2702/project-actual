$(function () {

  'use strict'

  console.log('Trang mua sản phẩm - Cộng tác viên');

  window.page = 1;

  getMuaSanPham();

  async function getMuaSanPham() {
    console.log('Đang chạy getMuaSanPham()');

    $('#icon-refresh-bank').css('visibility', 'visible');

    axios.get(`/cong-tac-vien/mua-san-pham/table?page=${window.page}`)
      .then(res => {
        $('#mua_san_pham_body').html(res.data);
        $('#icon-refresh-bank').css('visibility', 'hidden');

      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-bank').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.btnXem', function () {
    console.log('Đã bấm [btnXem]');

    const id = $(this).attr('hash');
    window.location = window.location.origin + `/cong-tac-vien/mua-san-pham/${id}/show`;
  });

  $('body').on('click', '.btnGio', function () {
    console.log('Đã bấm [btnGio]');

    const id = $(this).attr('hash');
    console.log(id);

    axios.get(`/cong-tac-vien/mua-san-pham/${id}/modal`)
      .then(res => {
        console.log(res.data);
        $('#modal').html(res.data);
        $('#gio_hang_modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnMuaSam', function () {
    console.log('Đã bấm [btnMuaSam]');

    const id = $('#id_san_pham').val();
    console.log(id);

    const payload = {
      so_luong: $('#so_luong').val(),
    }

    axios.post(`/cong-tac-vien/mua-san-pham/${id}/mua-sam`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '#btnGioHang', function () {
    console.log('Đã bấm [btnGioHang]');

    const id = $('#id_san_pham').val();
    console.log(id);

    const payload = {
      so_luong: $('#so_luong').val(),
    }

    axios.post(`/cong-tac-vien/mua-san-pham/${id}/mua-sam`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

    window.location = window.location.origin + '/cong-tac-vien/gio-hang';
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/mua-san-pham/search/${input_search}`)
    .then(res => {
      $('#mua_san_pham_body').html(res.data);
    }).catch(err => {
      displayErrors(err);
    });
  });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });

  $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        window.page = window.getPageFromUrl(url);
        console.log(url);
        getMuaSanPhamPaginate(url);
        // window.history.pushState("", "", url);
    });

    function getMuaSanPhamPaginate(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#mua_san_pham_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

});
