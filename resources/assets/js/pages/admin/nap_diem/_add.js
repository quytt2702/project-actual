$(function () {

  'use strict'

  console.log('Trang nạp điểm');

  window.page =1;

  getTable();

  function getTable() {
    console.log('Đang chạy getTable()');

    axios.get(`/admin/nap-diem/table?page=${window.page}`)
      .then(res => {
        $('#table_nap_tien').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('#btnAdd').on('click', function () {
    const payload = {
      so_luong_code : $('#so_luong_code').val(),
      so_diem       : $('#so_diem').val(),
      is_active    : $('#is_active').val(),
    };

    console.log(payload);

    axios.post(`/admin/nap-diem/add`, payload)
      .then(res => {
        getTable();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnKichHoat', function () {
    console.log('Đã bấm [btnKichHoat]');

    var id = $(this).attr('hash');

    axios.put(`/admin/nap-diem/kich-hoat/${id}`)
      .then(res => {
        getTable();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/nap-diem/search/${input_search}`)
      .then(res => {
        $('#table_nap_tien').html(res.data);
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
        getNapDiem(url);
        // window.history.pushState("", "", url);
    });

    function getNapDiem(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#table_nap_tien').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

});
