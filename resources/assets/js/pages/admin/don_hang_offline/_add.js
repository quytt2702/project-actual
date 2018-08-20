$(function () {

  'use strict'

  console.log('Trang đơn hàng offline');

  var sanPham = {};
  var data = [];

  $('#btnThemDonHang').on('click', function () {
    console.log('Đã bấn [btnThemDonHang]');
    const payload = {
      'ho_ten'            : $('#ho_ten').val(),
      'email'             : $('#email').val(),
      'sdt'               : $('#sdt').val(),
      'ghi_chu'           : $('#ghi_chu').val(),
      'duong'             : $('#duong').val(),
      'phuong'            : $('#phuong').val(),
      'quan'              : $('#quan').val(),
      'thanh_pho'         : $('#thanh_pho').val(),
      'noi_dung_san_pham' : data,
    };

    console.log(payload);

    axios.post(`/admin/don-hang-offline`, payload)
      .then(res => {
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
    console.log(payload);
  });

  $('#ten_san_pham').on('keyup', function () {
    var key = $(this).val();

    if (key == '') {
      return ;
    }
    console.log('Đang search với từ khoá: ' + key);

    axios.get(`/admin/san-pham/${key}/search`)
    .then(res => {
      $(this).autocomplete({
        source: function(request, response) {
          response(res.data);
        },
        select: function(event, ui) {
          $(this).val(ui.item.value);
          $('#don_gia').val(ui.item.price);
          sanPham.don_gia      = ui.item.price;
          sanPham.don_gia_view = window.number_format(sanPham.don_gia, 0);
          sanPham.id_san_pham  = ui.item.id;
          sanPham.ten_san_pham = ui.item.value;
          tinhThanhTien();
          return false;
        }
      });
    }).catch(err => {
      displayErrors(err);
    });
  });

  $('#so_luong').on('keyup', function () {
    tinhThanhTien();
  });

  $('#phan_tram_chiet_khau').on('keyup focusout', function () {
    tinhThanhTien();
  });

  function tinhThanhTien() {
    sanPham.chiet_khau      = $('#phan_tram_chiet_khau').val();
    sanPham.chiet_khau_view = window.number_format(sanPham.chiet_khau, 0);
    sanPham.so_luong        = $('#so_luong').val();
    sanPham.so_luong_view   = window.number_format(sanPham.so_luong, 0);

    if(sanPham.don_gia == '' || sanPham.so_luong == '' || sanPham.chiet_khau == '') {
      return;
    }

    sanPham.thanh_tien      = sanPham.don_gia * sanPham.so_luong * (1 - sanPham.chiet_khau/100);
    sanPham.thanh_tien_view = window.number_format(sanPham.thanh_tien, 0);

    $('#thanh_tien').val(sanPham.thanh_tien_view);
  }

  $('body').on('click', '#btnAdd', function () {
    console.log('Đã bấm [btnAdd]');

    if($('#ten_san_pham').val() == '' || $('#so_luong').val() == '' ||
      $('#phan_tram_chiet_khau').val() == '' || sanPham == null) {
      window.toastr.error('Bạn chưa điền đủ thông tin');
      return;
    }
    data.push(sanPham);
    view();
  });

  function view() {
    tinhThanhTien();
    console.log(data);

    var str = '';
    data.forEach(function (element) {
      str += `<tr>`;
      str += `<td >${element.ten_san_pham}</td>`;
      str += `<td class ="text-right">${element.so_luong_view} </td>`;
      str += `<td class ="text-right">${element.don_gia_view} VND </td>`;
      str += `<td class ="text-right">${element.chiet_khau_view} %</td>`;
      str += `<td class ="text-right">${element.thanh_tien_view} VND</td>`;
      str += `<td class ="text-center" ><button hash=${element.id_san_pham} style="width:33.94px" class='btn btn-rounded btn-danger btn-delete'>-</button></td>`;
      str += `</tr>`;
    })
    $('#san_pham_table').html(str);
    sanPham = {};

    // Reset view
    $('#ten_san_pham').val('');
    $('#so_luong').val('');
    $('#don_gia').val('');
    $('#phan_tram_chiet_khau').val('');
    $('#thanh_tien').val('');
  }

  $('body').on('click', '.btn-delete', function () {
    const id_sp = $(this).attr('hash');
    var new_data = [];
    data.forEach(function(element) {
      if(id_sp != element.id_san_pham) {
        new_data.push(element);
      }
    });
    data = new_data;
    view();
  });

  $('body').on('change', '#thanh_pho', function () {
    var hash = $(this).val();
    console.log('Đang thay đổi [thanh_pho]');
    console.log(hash);
    axios.get(`/dia-chi/add/quan/${hash}`)
      .then(res => {
        $('#quan').html(res.data);
        $('#quan').trigger('change');
      }).catch(err => {
        displayErrors(err);
      })
  });

  $('body').on('change', '#quan', function() {
    var hash = $(this).val();
    console.log('Đang thay đổi [quan]');
    console.log(hash);
    axios.get(`/dia-chi/add/phuong/${hash}`)
      .then(res => {
        $('#phuong').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#thanh_pho').trigger('change');

});
