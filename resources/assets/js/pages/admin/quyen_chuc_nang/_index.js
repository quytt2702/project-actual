$(function () {

  'use strict'

  console.log('Trang quyền - chức năng');

  window.quyen_id = -1;

  getChucNang();

  $('.list-quyen').on('click', function () {
    // Thay đổi màu
    $('.list-quyen').css('background-color', 'white');
    $('.list-quyen').css('color', '#797979');
    $(this).css('background-color', '#4267b2');
    $(this).css('color', '#fff');

    // Xử lý
    window.quyen_id = $(this).attr('hash');
    getChucNang();
  });

  function getChucNang() {
    console.log('getChucNang()');

    if (window.quyen_id == -1) {
      return ;
    }
    axios.get(`/admin/quyen-chuc-nang/get-chuc-nang/${window.quyen_id}`)
      .then(res => {
        $('#quyen_chuc_nang_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
    });
  }

  $('body').on('click', '.checkboxes', function () {
    var id_chuc_nang = $(this).val();

    window.checked = [];
    $("input[name='options[]']:checked").each(function () {
      window.checked.push($(this).val());
    });

    console.log(window.checked);

    axios.put(`/admin/quyen-chuc-nang/${window.quyen_id}/${id_chuc_nang}`)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

});
