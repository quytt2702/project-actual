$(function () {

  'use strict'

  console.log('Trang hoá đơn nhập hàng - Admin');

  window.don_hang_id = -1;
  var donHang = [];

  getDanhSachDonHang();

  function getChiTietHoaDon() {
    axios.get(`/admin/hoa-don-nhap-hang/chi-tiet/${window.don_hang_id}`)
      .then(res => {
        $('#chi_tiet_don_nhap_hang_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.danh_sach_don_hang', function () {
    // Thay đổi màu
    $('.danh_sach_don_hang').css('background-color', 'white');
    $('.danh_sach_don_hang').css('color', '#797979');
    $(this).css('background-color', '#4267b2');
    $(this).css('color', '#fff');

    // Xử lý
    window.don_hang_id = $(this).attr('hash');
    console.log('Đơn hàng id: ' + window.don_hang_id);
    getChiTietHoaDon();
  });

  $('#btnAdd').on('click', function () {
    console.log('Đã bấm [btnAdd]');

    donHang = [];

    axios.get(`/admin/hoa-don-nhap-hang/add`)
      .then(res => {
        $('#modal').html(res.data);
        $('#tao_moi_don_hang_modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });

  });

  function getDanhSachDonHang() {
    console.log('Đang chạy getDanhSachDonHang()');

    axios.get(`/admin/hoa-don-nhap-hang/list`)
      .then(res => {
        $('#danh_sach_don_hang_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  function exportView() {
    var html = '';

    for (var i = 0; i < donHang.length; i++) {
      html += '<tr>' +
                '<td style="padding-left: 16px;">' + (i+1) + '</td>' +
                '<td style="padding-left: 16px;">' + donHang[i].ten_san_pham + '</td>' +
                '<td style="padding-right: 16px;" class="text-right">' + donHang[i].so_luong + '</td>' +
                '<td style="padding-right: 16px;" class="text-right">' + donHang[i].don_gia + ' VND</td>' +
                '<td style="padding-left: 16px;">' + donHang[i].nha_cung_cap_ten + '</td>' +
                '<td><button class="btn btn-danger btn-xs btnRemove" hash="' + i + '" style="width: 33px;">-</button></td>' +
              '</tr>';
    }

    $('#chi_tiet_table').html(html);
  }

  $('body').on('click', '#btnAddModal', function () {
    console.log('Đang chạy [btnAddModal]');
    var is_new = true;
    if (donHang.length > 0) {
      donHang.forEach(function (item) {
        if ($('#san_pham').val() == item.id_san_pham) {
          item.so_luong += parseInt($('#so_luong').val());
          is_new = false;
        }
      });
    }

    if (is_new) {
      $('#btnLuuModal').prop('disabled', false);

      donHang.push({
        'id_san_pham'       : $('#san_pham').val(),
        'ten_san_pham'      : $('#san_pham > option:selected').attr('san_pham_ten'),
        'so_luong'          : parseInt($('#so_luong').val()),
        'don_gia'           : parseInt($('#don_gia').val()),
        'id_nha_cung_cap'   : $('#nha_cung_cap').val(),
        'nha_cung_cap_ten'  : $('#nha_cung_cap > option:selected').attr('nha_cung_cap_ten'),
      });
    }

    console.log(donHang);

    exportView();
  });

  $('body').on('click', '.btnRemove', function () {
    const hash = parseInt($(this).attr('hash'));

    donHang.splice(hash, 1);

    if (donHang.length === 0) {
      $('#btnLuuModal').prop('disabled', true);
    }

    exportView();
  });

  $('body').on('click', '#btnLuuModal', function () {
    axios.post(`/admin/hoa-don-nhap-hang`, donHang)
      .then(res => {
        getDanhSachDonHang();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

      donHang = [];
  });

  $('body').on('focusout', '#so_luong', function () {
    if ($(this).val() < 1) {
      $(this).val(1);
    }
  });

  $('body').on('focusout', '#don_gia', function () {
    if ($(this).val() < 0) {
      $(this).val(0);
    }
  });

  $('body').on('click', '.btnEdit', function () {
    console.log('Đã bấm [btnEdit]');

    const id = $(this).data('code');

    axios.get(`/admin/hoa-don-nhap-hang/${id}/edit-modal`,)
      .then(res => {
        console.log(res.data);
        $('#modal').html(res.data.view);
        donHang = res.data.sanPhamTrongHoaDon;
        $('#sua_don_hang_modal').modal('show');
        console.log(donHang);
        exportView();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnDelete', function () {
    console.log('Đã bấm [btnDelete]');

    const id = $(this).data('code');

    axios.delete(`/admin/hoa-don-nhap-hang/${id}`,)
      .then(res => {
        getDanhSachDonHang();
        getChiTietHoaDon();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnCapNhat', function () {
    console.log('Đã bấm [btnCapNhat]');

    const id = $(this).data('code');


    axios.put(`/admin/hoa-don-nhap-hang/${id}/update`, donHang)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });

  });
});
