$(function () {

  'use strict'

  console.log('Trang thêm mới sản phẩm');

  var idsChuyenMucSanPham = [];

  $('#mo_ta_ngan').wysihtml5({
    'stylesheets': false
  });

  $('#ten_san_pham').on('keyup', function () {
    console.log('Đã tạo link sản phẩm');

    var title = $('#ten_san_pham').val();

    title = window.convertToSlug(title);

    $('#link').val(title);
  });

  $('.chuyenMucSanPham').on('click', function () {
    console.log($(this).attr('id_ngon_ngu'));

    if (idsChuyenMucSanPham.length > 0) {
      if ($.inArray($(this).attr('id_ngon_ngu'), idsChuyenMucSanPham) === -1) {
        window.toastr.error('Bạn không thể chọn chuyên mục khác ngôn ngữ');
        $(this).prop('checked', false);
      } else {
        idsChuyenMucSanPham.push($(this).attr('id_ngon_ngu'));
      }
    }
  });

  $('#edit_link').on('click', function() {
    window.link = $('#link').val();
    console.log('click');

    if ($(this).text() == 'Chỉnh sửa link sản phẩm') {
      $(this).html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      var link = window.convertToSlug($('#link').val());
      $('#link').val(link);
      $(this).html('Chỉnh sửa link sản phẩm');
      $('#link').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }

  });

  $('#cancel_link').on('click', function () {
    $('#link').val(window.link);

    if ($('#edit_link').text() == 'Chỉnh sửa link bài viết') {
      $('#edit_link').html('Xong');
      $('#link').prop('disabled', false);
      $('#cancel_link').css('display', 'inline');
    } else {
      $('#edit_link').html('Chỉnh sửa link bài viết');
      $('#link').prop('disabled', true);;
      $('#cancel_link').css('display', 'none');
    }
  });

  $('#btnSubmit').on('click', function () {
    console.log('Đang chạy [btnSubmit]');
    const chuyen_muc = JSON.stringify( $("input[name='chuyenMucSanPham']:checked").map(function(){
      return this.value;
    }).get());

    console.log(chuyen_muc);

    const payload = {
      san_pham_ma                 : $('#ma_san_pham').val(),
      san_pham_ten                : $('#ten_san_pham').val(),
      san_pham_url                : $('#link').val(),
      san_pham_mo_ta              : $('#mo_ta_ngan').val(),
      san_pham_noi_dung_tab_1     : (CKEDITOR.instances['san_pham_noi_dung_tab_1']) ? CKEDITOR.instances.san_pham_noi_dung_tab_1.getData() : '',
      san_pham_noi_dung_tab_2     : (CKEDITOR.instances['san_pham_noi_dung_tab_2']) ? CKEDITOR.instances.san_pham_noi_dung_tab_2.getData() : '',
      san_pham_noi_dung_tab_3     : (CKEDITOR.instances['san_pham_noi_dung_tab_3']) ? CKEDITOR.instances.san_pham_noi_dung_tab_3.getData() : '',
      san_pham_noi_dung_tab_4     : (CKEDITOR.instances['san_pham_noi_dung_tab_4']) ? CKEDITOR.instances.san_pham_noi_dung_tab_4.getData() : '',
      san_pham_noi_dung_tab_5     : (CKEDITOR.instances['san_pham_noi_dung_tab_5']) ? CKEDITOR.instances.san_pham_noi_dung_tab_5.getData() : '',
      san_pham_keyword            : $('#keyword').val(),
      san_pham_id_chuyen_muc      : chuyen_muc,
      san_pham_tags               : $('#tags').val(),
      san_pham_gia_ban_thuc_te    : $('#gia_ban_thuc_te').val(),
      san_pham_gia_ban_khuyen_mai : $('#gia_ban_khuyen_mai').val(),
      san_pham_hinh_dai_dien      : $('#ckfinder-input-2').attr('src'),
    };

    axios.post(`/admin/san-pham`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('#gia_ban_khuyen_mai').on('keyup', function () {
    var gia_ban = $(this).val();

    $('#gia_khuyen_mai_text').html(window.numberToWord(gia_ban) + " đồng");
  });

  $('#gia_ban_thuc_te').on('keyup', function () {
    var gia_ban = $(this).val();

    $('#gia_thuc_te_text').html(window.numberToWord(gia_ban) + " đồng");
  });

  $('#btnHuyBo').on('click', function () {
    window.location = window.location.origin + '/admin/san-pham/list';
  });

});
