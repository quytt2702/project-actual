$(function () {

  'use strict'

  console.log('Trang quản lý bài viết');

  window.status = 'Active';
  window.pageBv = 1;
  window.pageTr = 1;

  getActive();

  function getActive() {
    console.log('Đang chạy getActive()');

    window.status = 'Active';
    axios.get(`/admin/bai-viet/list/active?page=${window.pageBv}`)
      .then(res => {
        $('#bai-viet-body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  function getTrash() {
    console.log('Đang chạy getTrash()');

    window.status = 'Trash';
    axios.get(`/admin/bai-viet/list/trash?page=${window.pageTr}`)
      .then(res => {
        $('#bai-viet-body').html(res.data);
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

    console.log(hash);

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

    axios.delete(`/admin/bai-viet/${hash}/delete`)
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

    axios.put(`/admin/bai-viet/${hash}/restore`)
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

    window.location = window.location.origin + `/admin/bai-viet/${hash}/edit`;
  });

  $('body').on('click', '.btnLichSu', function () {
    const id = $(this).attr('hash');

    window.location = window.location.origin + `/admin/lich-su-bai-viet/${id}`;
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/admin/bai-viet/search/${input_search}/${window.status}`)
      .then(res => {
        $('#bai-viet-body').html(res.data);
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
          window.pageBv = window.getPageFromUrl(url);
        } else {
          window.pageTr = window.getPageFromUrl(url);
        }
        console.log(url);
        getBaiViet(url);
        // window.history.pushState("", "", url);
    });

    function getBaiViet(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#bai-viet-body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
