$(function () {

  'use strict'

  console.log('Trang quản lý sản phẩm');

  window.status = 'Active';
  window.pageSp = 1;
  window.pageTr = 1;

  getActive();

  function getActive() {
    console.log('Đang chạy getActive()');

    window.status = 'Active';
    axios.get(`/admin/san-pham/list/active?page=${window.pageSp}`)
      .then(res => {
        $('#san-pham-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  function getTrash() {
    console.log('Đang chạy getTrash()');

    window.status = 'Trash';
    axios.get(`/admin/san-pham/list/trash?page=${window.pageTr}`)
      .then(res => {
        $('#san-pham-body').html(res.data);
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

    axios.put(`/admin/san-pham/${hash}/duyet`)
      .then(res => {
        getActive();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnXoa', function() {
    const hash = $(this).attr('hash');

    axios.delete(`/admin/san-pham/${hash}/delete`)
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

    axios.put(`/admin/san-pham/${hash}/restore`)
      .then(res => {
        getCurrentBody();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnSua', function() {
    console.log('Đã bấm [btnSua]');
    const hash = $(this).attr('hash');
    // window.location = `admin/san-pham/${hash}/edit`;
    window.location = window.location.origin + `/admin/san-pham/${hash}/edit`;
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/san-pham/search/${input_search}/${window.status}`)
      .then(res => {
        $('#san-pham-body').html(res.data);
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
          window.pageSp = window.getPageFromUrl(url);
        } else {
          window.pageTr = window.getPageFromUrl(url);
        }
        console.log(url);
        getSanPham(url);
        // window.history.pushState("", "", url);
    });

    function getSanPham(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#san-pham-body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
