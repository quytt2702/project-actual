$(function () {

  'use strict'

  console.log('Trang lịch sử hoá đơn nhập hàng - Admin');

  window.ngay_thay_doi = -1;
  var donHang = [];

  function getLichSuChiTietHoaDon() {
    axios.get(`/admin/lich-su-hoa-don-nhap-hang/chi-tiet/${window.ngay_thay_doi}`)
      .then(res => {
        $('#chi_tiet_sua_don_nhap_hang_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.danh_sach_lich_su_don_hang', function () {
    // Thay đổi màu
    $('.danh_sach_lich_su_don_hang').css('background-color', 'white');
    $('.danh_sach_lich_su_don_hang').css('color', '#797979');
    $(this).css('background-color', '#4267b2');
    $(this).css('color', '#fff');

    // Xử lý
    window.ngay_thay_doi = $(this).attr('hash');
    console.log('Lịch sử đơn hàng id: ' + window.ngay_thay_doi);
    getLichSuChiTietHoaDon();
  });

});
