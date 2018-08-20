$(function () {

  'use strict'

  console.log('Trang danh sách link - Cộng tác viên');

  getDanhSachLink();

  async function getDanhSachLink() {
    console.log('Đang chạy getDanhSachLink()');

    axios.get('/cong-tac-vien/danh-sach-link/table')
      .then(res => {
        $('#danh_sach_link_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
    });
  }

  $('body').on('click', '#btnCopy', function () {
    console.log('Đã bấm [btnCopy]');

    window.copyToClipboardTemplate($(this).attr('url'));
  });

  $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        console.log(url);
        getgetLink(url);
    });

    function getgetLink(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('#danh_sach_link_body').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
