$(function () {

  'use strict'

  console.log('Trang đại lý - cộng tác viên');

  window.status = 'tab_01';
  window.dai_ly = '';

  $('.list-user').on('click', function () {
    // Thay đổi màu
    $('.list-user').css('background-color', 'white');
    $('.list-user').css('color', '#797979');
    $(this).css('background-color', '#4267b2');
    $(this).css('color', '#fff');

    // Xử lý
    window.dai_ly = $(this).attr('hash');
    console.log('Cộng tác viên: ' + window.dai_ly);
    getTab();
  });

  function getTab() {
    if (window.dai_ly == '') {
      return ;
    }
    axios.get(`/admin/dai-ly-ctv/get-tab/${window.dai_ly}/${window.status}`)
      .then(res => {
        $('#cong_tac_vien_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
    });
  }

  $('#tab_01').on('click', function () {
    window.status = 'tab_01';

    getTab();
  });

  $('#tab_02').on('click', function () {
    window.status = 'tab_02';

    getTab();
  });

  $('#tab_03').on('click', function () {
    window.status = 'tab_03';

    getTab();
  });

  $('body').on('click', '.check', function () {
    var email = $(this).attr('hash');

    axios.put(`/admin/dai-ly-ctv/${email}/${window.dai_ly}`)
      .then(res => {
        displayMessage(res);
        getTab();
      }).catch(err => {
        displayErrors(err);
      });
  });

});
