(function () {

  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  // Quản lý hồ sơ
  if (/^\/cong-tac-vien\/ho-so$/.test(pathname)) {
    require('./cong_tac_vien/ho_so/_index');
    return;
  }

  // Link giới thiệu
  if (/^\/cong-tac-vien\/link-gioi-thieu$/.test(pathname)) {
    require('./cong_tac_vien/link_gioi_thieu/_index');
    return;
  }

  // Nạp điểm
  if (/^\/cong-tac-vien\/nap-diem$/.test(pathname)) {
    require('./cong_tac_vien/nap_diem/_index');
    return;
  }

  // Mua sản phẩm
  if (/^\/cong-tac-vien\/mua-san-pham$/.test(pathname)) {
    require('./cong_tac_vien/mua_san_pham/_index');
    return;
  }

  // Mua sản phẩm chi tiết
  if (/^\/cong-tac-vien\/mua-san-pham\/(.*)\/show$/.test(pathname)) {
    require('./cong_tac_vien/mua_san_pham/_show');
    return;
  }

  // Quản lý hồ sơ
  if (/^\/cong-tac-vien\/gio-hang$/.test(pathname)) {
    require('./cong_tac_vien/gio_hang/_index');
    return;
  }

  // Quản lý hồ sơ
  if (/^\/cong-tac-vien\/danh-sach-link$/.test(pathname)) {
    require('./cong_tac_vien/danh_sach_link/_index');
    return;
  }

  // Quản lý hồ sơ
  if (/^\/cong-tac-vien\/dai-ly-cua-toi$/.test(pathname)) {
    require('./cong_tac_vien/dai_ly_cua_toi/_index');
    return;
  }

  // Người dùng liên kết
  if (/^\/cong-tac-vien\/nguoi-dung-lien-ket$/.test(pathname)) {
    require('./cong_tac_vien/nguoi_dung_lien_ket/_index');
    return;
  }

  // Lịch sử thưởng giới thiệu
  if (/^\/cong-tac-vien\/lich-su-thuong-gioi-thieu$/.test(pathname)) {
    require('./cong_tac_vien/lich_su_thuong_gioi_thieu/_index');
    return;
  }

  // Danh sách giới thiệu
  if (/^\/cong-tac-vien\/danh-sach-gioi-thieu$/.test(pathname)) {
    require('./cong_tac_vien/danh_sach_gioi_thieu/_index');
    return;
  }

  // Lịch sử thưởng đơn hàng
  if (/^\/cong-tac-vien\/lich-su-thuong-don-hang$/.test(pathname)) {
    require('./cong_tac_vien/lich_su_thuong_don_hang/_index');
    return;
  }

  // Lịch sử mua hàng
  if (/^\/cong-tac-vien\/lich-su-mua-hang$/.test(pathname)) {
    require('./cong_tac_vien/lich_su_mua_hang/_index');
    return;
  }
  // Rút tiên
  if (/^\/cong-tac-vien\/rut-tien$/.test(pathname)) {
    require('./cong_tac_vien/rut_tien/_index');
    return;
  }
})();
