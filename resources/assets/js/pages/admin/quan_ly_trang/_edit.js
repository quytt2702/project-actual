import dragula from 'dragula';

$(function () {

  'use strict'

  console.log('Sửa trang - Admin');

  window.index = 0;

  dragula([
    document.querySelector('#chosen_sections'),
  ]);

  $('#url').val(window.convertToSlug($('#ten_trang').val()));
  $('#url_backup').val(window.convertToSlug($('#ten_trang').val()));

  $('.add_section').on('click', function () {
    console.log('Đã bấm [add_section]');

    const code = $(this).data('section-code');

    const payload = {
      index: window.index++,
    };

    console.log(payload);
    axios.post(`/admin/quan-ly-trang/them-section/${code}`, payload)
      .then(res => {
        $('#chosen_sections').append(res.data);
      }).catch(err => {
        displayErrors(err);
    });

  });

  $('#ten_trang').on('keyup', function () {
    console.log('Đã tạo link bài viết');

    var title = $('#ten_trang').val();

    title = window.convertToSlug(title);

    $('#url').val(title);
    $('#url_backup').val(title);
  });

  $('#edit_link').on('click', function() {
    window.link = $('#url').val();
    console.log('click');

    if ($(this).text() == 'Chỉnh sửa') {
      $(this).html('Xong');
      $('#url').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      var link = window.convertToSlug($('#url').val());
      $('#url').val(link);
      $(this).html('Chỉnh sửa');
      $('#url').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }

  });

  $('#cancel_link').on('click', function () {
    $('#url').val(window.link);

    if ($('#edit_link').text() == 'Chỉnh sửa') {
      $('#edit_link').html('Xong');
      $('#url').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      $('#edit_link').html('Chỉnh sửa');
      $('#url').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }
  });

});
