$(function () {

  'use strict'

  console.log('Trang quản lý nhà cung cấp');

  window.status = 'Active';

  window.pageNcc = 1;
  window.pageTr = 1;

  getActive();

  function getActive() {
    console.log('Đang chạy getActive()');

    window.status = 'Active';
    axios.get(`/admin/nha-cung-cap/list/active?page=${window.pageNcc}`)
      .then(res => {
        $('#nha-cung-cap-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  function getTrash() {
    console.log('Đang chạy getTrash()');

    window.status = 'Trash';
    axios.get(`/admin/nha-cung-cap/list/trash?page=${window.pageTr}`)
      .then(res => {
        $('#nha-cung-cap-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  function getCurrentBody() {
    if (window.status == 'Active') {
      getActive();
    } else {
      getTrash();
    }
  }

  $('#active').on('click', function () {
    getActive();
  });

  $('#trash').on('click', function () {
    getTrash();
  });

  $('body').on('click', '.btnDuyet', function() {
    const hash = $(this).attr('hash');

    axios.put(`/admin/bai-viet/${hash}/duyet`)
      .then(res => {
        getActive();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnXoa', function() {
    const hash = $(this).attr('hash');

    axios.delete(`/admin/nha-cung-cap/${hash}/delete`)
      .then(res => {
        getCurrentBody();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnKhoiPhuc', function () {
    console.log('Đã bấm [btnKhoiPhuc]')

    const hash = $(this).attr('hash');

    axios.put(`/admin/nha-cung-cap/${hash}/restore`)
      .then(res => {
        getCurrentBody();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnSua', function () {
    console.log('Đã bấm [btnSua]');

    const hash = $(this).attr('hash');

    window.location = window.location.origin + `/admin/nha-cung-cap/${hash}/edit`;
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/nha-cung-cap/search/${input_search}/${window.status}`)
      .then(res => {
        $('#nha-cung-cap-body').html(res.data);
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
        if (window.status == 'Active') {
          window.pageNcc = window.getPageFromUrl(url);
        } else {
          window.pageTr = window.getPageFromUrl(url);
        }
        console.log(url);
        getNhaCungCap(url);
        // window.history.pushState("", "", url);
    });

    function getNhaCungCap(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#nha-cung-cap-body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
