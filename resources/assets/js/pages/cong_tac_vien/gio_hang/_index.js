$(function () {

  'use strict'

  console.log('Trang giỏ hàng - Cộng tác viên');

  getGioHang();

  function getGioHang() {
    console.log('Đang chạy [getGioHang]');

    axios.get(`/cong-tac-vien/gio-hang/list`)
      .then(res => {
        $('#page_gio_hang').html(res.data);
        // displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  }

  let updateGioHang = null;

  $('body').on('keyup mouseup focusout', '.so_luong', function () {
    // Nếu giá trị nhập vào bé hơn 1
    // Thì set lại là 1 và ko làm gì thêm
    if ($(this).val() < 1) {
      $(this).val(1);
      return;
    }

    // Cập nhật lại giỏ hàng
    clearTimeout(updateGioHang);
    updateGioHang = setTimeout(function () {
      console.log('Đã cập nhật giỏ hàng');
      var san_pham = [];
      $('.so_luong').each(function () {
        san_pham.push({
          san_pham_id      : $(this).attr('hash'),
          san_pham_so_luong: $(this).val(),
        });
      });

      console.log(san_pham);

      axios.put(`/cong-tac-vien/gio-hang`, san_pham)
        .then(res => {
          displayMessage(res);
        }).catch(err => {
          displayErrors(err);
        });
    }, 1000);

    // Xử lý hiển thị
    var index = $(this).attr('index');
    var thuong_doanh_thu = $('#thuong_doanh_thu').val();
    console.log(thuong_doanh_thu);
    $('.gia_ban')[index * 1].innerText = window.number_format($(this).val() * $(this).attr('san_pham_gia_ban_thuc_te') * (1 - thuong_doanh_thu / 100), 0) + ' VND';

    var tongVND = 0;
    var tongMilk = 0;
    $('.so_luong').each(function () {
      tongVND  += ($(this).attr('san_pham_gia_ban_thuc_te') * (1 - thuong_doanh_thu / 100)) * $(this).val();
      tongMilk += ($(this).attr('san_pham_gia_ban_thuc_te') / $(this).attr('ti_gia_milk') * (1 - thuong_doanh_thu / 100)) * $(this).val();
    });

    $('#tong_tien_vnd').html(window.number_format(tongVND, 0) + ' VND');
    $('#tong_tien_milk').html(window.number_format(tongMilk, 0) + ' MILK');
  });

  $('body').on('click', '.btnThanhToan', function () {
    console.log('Đã bấm [btnThanhToan]');

    var san_pham = [];
    $('.so_luong').each(function () {
      san_pham.push({
        id      : $(this).attr('hash'),
        so_luong: $(this).val(),
      });
    });

    const payload = {
      'phuong_thuc_thanh_toan'  : $('input[name=phuong_thuc_thanh_toan]:checked').val(),
      'san_pham'                : san_pham,
      'dia_chi_giao_hang'       : $('#dia_chi_giao_hang').val(),
    };

    axios.post(`/cong-tac-vien/gio-hang`, payload)
      .then(res => {
        getGioHang();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });

  $('body').on('click', '.btnTroVe', function () {
    window.location = window.location.origin + '/cong-tac-vien/mua-san-pham';
  });

  $('body').on('click', '.btnXoa', function () {
    console.log('Đã bấm [btnXoa]');

    const code = $(this).data('code');

    axios.delete(`/cong-tac-vien/gio-hang/${code}`)
      .then(res => {
        getGioHang();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });
});
