$(function () {

  'use strict'

  console.log('Hoá đơn bán hàng chung');

  getHoaDonBanHang();

  function getHoaDonBanHang() {
    axios.get(window.location.pathname + '/table')
      .then(res => {
        console.log(res.data);
        $('#hoa_don_ban_hang_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnChiTiet', function() {
    console.log('Đã bấm [btnChiTiet]');

    const txid = $(this).attr('txid');

    axios.get(`/admin/hoa-don-ban-hang/cong-tac-vien/${txid}/chi-tiet`)
      .then(res => {
        $('#modal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#radio1', function () {
    $('.collapse_don_vi_van_chuyen_modal').collapse('hide');
    $('.collapse_ly_do_modal').collapse('hide');
  });

  $('body').on('click', '#radio2', function () {
    $('.collapse_don_vi_van_chuyen_modal').collapse('show');
    $('.collapse_ly_do_modal').collapse('hide');
  });

  $('body').on('click', '#radio3', function () {
    $('.collapse_don_vi_van_chuyen_modal').collapse('hide');
    $('.collapse_ly_do_modal').collapse('show');
  });

  $('body').on('click', '#btnXacNhanGiaoHang', function () {
    console.log('Đã bấm [btnXacNhanGiaoHang]');

    const code = $(this).data('code');

    const payload = {
      ma_van_don             : $('#ma_van_don').val(),
      don_vi_van_chuyen      : $('#don_vi_van_chuyen').val(),
      phuong_thuc_van_chuyen : $('input[name=phuong_thuc_van_chuyen]:checked').val(),
      ly_do                  : $('#ly_do').val(),
    };

    console.log(payload);

    axios.put(`/admin/hoa-don-ban-hang/cong-tac-vien/xac-nhan-giao-hang/${code}`, payload)
      .then(res => {
        displayMessage(res);
        getHoaDonBanHang();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnXacNhanBiHuy', function () {
    console.log('Đã bấm [btnXacNhanBiHuy]');

    const code       = $('#code').val();
    const trang_thai = $('input[name=trangThaiBiHuy]:checked').data('code');
    const payload    =  {
      ly_do : $('#ly_do').val(),
    }

    console.log(code + ' ' + trang_thai);

    axios.put(`/admin/hoa-don-ban-hang/cong-tac-vien/trang-thai/${code}/${trang_thai}`, payload)
      .then(res => {
        displayMessage(res);
        getHoaDonBanHang();
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnTrangThaiDonHang', function () {
    console.log('Đã bấm [btnTrangThaiDonHang]');

    const code = $(this).data('code');

    console.log(code);

    axios.get(`/admin/hoa-don-ban-hang/cong-tac-vien/trang-thai/${code}`)
      .then(res => {
        $('#modal').html(res.data);
        $('#trang_thai_modal').modal('show');
        console.log(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '.btnTaiXuong', function() {
    console.log('Đã bấm [btnTaiXuong]');

    const hash = $(this).attr('hash');

    window.open(window.location.origin + '/admin/hoa-don-ban-hang/' + hash + '/in');
  });

});
