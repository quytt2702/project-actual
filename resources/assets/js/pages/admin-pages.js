(function () {

  'use strict';

  const pathname = '/' + window.trimSlash(window.location.pathname);

  if (/^\/$/.test(pathname)) {
    require('./_home');
    return;
  }

  // Admin - Giới thiệu Lavion (Chỉnh sửa)
  if (/^\/admin\/gioi-thieu-lavion$/.test(pathname)) {
    require('./admin/gioi_thieu_lavion/_index');
    return;
  }

  // Admin - Code nạp tiền (Chỉnh sửa)
  if (/^\/admin\/code-nap-tien$/.test(pathname)) {
    require('./admin/code_nap_tien/_index');
    return;
  }

  // Admin - Chính sách bán hàng (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-ban-hang$/.test(pathname)) {
    require('./admin/chinh_sach_ban_hang/_index');
    return;
  }

  // Admin - Chính sách bảo hành (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-bao-hanh$/.test(pathname)) {
    require('./admin/chinh_sach_bao_hanh/_index');
    return;
  }

  // Admin - Chính sách bảo mật (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-bao-mat$/.test(pathname)) {
    require('./admin/chinh_sach_bao_mat/_index');
    return;
  }

  // Admin - Chính sách đổi hàng (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-doi-hang$/.test(pathname)) {
    require('./admin/chinh_sach_doi_hang/_index');
    return;
  }

  // Admin - Chính sách giao hàng (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-giao-hang$/.test(pathname)) {
    require('./admin/chinh_sach_giao_hang/_index');
    return;
  }

  // Admin - Chính sách thanh toán (Chỉnh sửa)
  if (/^\/admin\/chinh-sach-thanh-toan$/.test(pathname)) {
    require('./admin/chinh_sach_thanh_toan/_index');
    return;
  }

  // Admin - Chương trình CTV Online (Chỉnh sửa)
  if (/^\/admin\/chuong-trinh-ctv-online$/.test(pathname)) {
    require('./admin/chuong_trinh_ctv_online/_index');
    return;
  }

  // Admin - Giới thiệu Lavion (Chỉnh sửa)
  if (/^\/admin\/dich-vu-khach-hang$/.test(pathname)) {
    require('./admin/dich_vu_khach_hang/_index');
    return;
  }

  // Admin - Điều khoản sử dụng (Chỉnh sửa)
  if (/^\/admin\/dieu-khoan-su-dung$/.test(pathname)) {
    require('./admin/dieu_khoan_su_dung/_index');
    return;
  }

  // Admin - Điều khoản và hợp đồng CTV (Chỉnh sửa)
  if (/^\/admin\/dieu-khoan-va-hop-dong-ctv$/.test(pathname)) {
    require('./admin/dieu_khoan_va_hop_dong_ctv/_index');
    return;
  }

  // Admin - Hỏi và đáp (Chỉnh sửa)
  if (/^\/admin\/hoi-va-dap$/.test(pathname)) {
    require('./admin/hoi_va_dap/_index');
    return;
  }

  // Admin - Mô hình kinh doanh (Chỉnh sửa)
  if (/^\/admin\/mo-hinh-kinh-doanh$/.test(pathname)) {
    require('./admin/mo_hinh_kinh_doanh/_index');
    return;
  }

  // Admin - Thông tin liên hệ (Chỉnh sửa)
  if (/^\/admin\/thong-tin-lien-he$/.test(pathname)) {
    require('./admin/thong_tin_lien_he/_index');
    return;
  }

  // Admin - Quản lý ngân hàng
  if (/^\/admin\/ngan-hang$/.test(pathname)) {
    require('./admin/ngan_hang/_index');
    return;
  }

  // Admin - Quản lý phần trăm thưởng ngân hàng
  if (/^\/admin\/phan-tram-thuong-dai-ly$/.test(pathname)) {
    require('./admin/phan_tram_thuong_dai_ly/_index');
    return;
  }

  // Admin - Quản lý nhân viên hệ thống
  if (/^\/admin\/nhan-vien-he-thong\/list$/.test(pathname)) {
    require('./admin/nhan_vien_he_thong/_index');
    return;
  }

  // Admin - Thêm nhân viên hệ thống
  if (/^\/admin\/nhan-vien-he-thong\/add$/.test(pathname)) {
    require('./admin/nhan_vien_he_thong/_add');
    return;
  }

  // Admin - Quản lý cài đặt
  if (/^\/admin\/cai-dat-chung$/.test(pathname)) {
    require('./admin/cai_dat/_index');
    return;
  }

  // Admin - Chính sách cộng tác viên
  if (/^\/admin\/chinh-sach-ctv$/.test(pathname)) {
    require('./admin/chinh_sach_ctv/_index');
    return;
  }

  // Admin - Quản lý nhóm quyền
  if (/^\/admin\/nhom-quyen$/.test(pathname)) {
    require('./admin/nhom_quyen/_index');
    return;
  }

  // Admin - Quản lý ngôn ngữ
  if (/^\/admin\/ngon-ngu$/.test(pathname)) {
    require('./admin/ngon_ngu/_index');
    return;
  }

  // Admin - Quản lý đại lý
  if (/^\/admin\/quan-ly-dai-ly$/.test(pathname)) {
    require('./admin/quan_ly_dai_ly/_index');
    return;
  }

  // Admin - Nâng cấp thành đại lý
  if (/^\/admin\/nang-cap-thanh-dai-ly$/.test(pathname)) {
    require('./admin/nang_cap_thanh_dai_ly/_index');
    return;
  }

  // Admin - Quản lý cài đặt ngôn ngữ
  if (/^\/admin\/cai-dat-ngon-ngu$/.test(pathname)) {
    require('./admin/cai_dat_ngon_ngu/_index');
    return;
  }

  // Admin - Người dùng
  // Admin - Quản lý người dùng
  if (/^\/admin\/nguoi-dung$/.test(pathname)) {
    require('./admin/nguoi_dung/_index');
    return;
  }

  // Admin - Thêm người dùng
  if (/^\/admin\/nguoi-dung\/add$/.test(pathname)) {
    require('./admin/nguoi_dung/_store');
    return;
  }

  // Admin - Xem người dùng
  if (/^\/admin\/nguoi-dung\/(.*)\/show$/.test(pathname)) {
    require('./admin/nguoi_dung/_show');
    return;
  }

  // Admin - Sửa người dùng
  if (/^\/admin\/nguoi-dung\/(.*)\/edit$/.test(pathname)) {
    require('./admin/nguoi_dung/_edit');
    return;
  }
  // End Admin - Người dùng

  // Admin - Cộng tác viên
  // Admin - Quản lý cộng tác viên
  if (/^\/admin\/cong-tac-vien\/list$/.test(pathname)) {
    require('./admin/cong_tac_vien/_index');
    return;
  }

  // Admin - Sửa cộng tác viên
  if (/^\/admin\/cong-tac-vien\/(.*)\/edit$/.test(pathname)) {
    require('./admin/cong_tac_vien/_edit');
    return;
  }

  // Admin - Xem cộng tác viên
  if (/^\/admin\/cong-tac-vien\/(.*)\/show$/.test(pathname)) {
    require('./admin/cong_tac_vien/_show');
    return;
  }

  // Admin - thống kê thu nhập cộng tác viên
  if (/^\/admin\/cong-tac-vien\/thong-ke-thu-nhap$/.test(pathname)) {
    require('./admin/cong_tac_vien/thong_ke_thu_nhap/_index');
    return;
  }
  // End Admin - Cộng tác viên

  // Admin - Chuyên mục bài viết page
  if (/^\/admin\/chuyen-muc-bai-viet$/.test(pathname)) {
    require('./admin/chuyen_muc/_index');
    return;
  }

  // Admin - Quản lý xác thực page
  if (/^\/admin\/xac-thuc$/.test(pathname)) {
    require('./admin/xac_thuc/_index');
    return;
  }

  // Admin - Xác thực chi tiết page
  if (/^\/admin\/xac-thuc\/(.*)\/show$/.test(pathname)) {
    require('./admin/xac_thuc/_show');
    return;
  }

  // Admin - Bài viết
  // Admin - Thêm bài viết
  if (/^\/admin\/bai-viet\/add$/.test(pathname)) {
    require('./admin/bai_viet/_add');
    return;
  }

  // Admin - Sửa bài viết
  if (/^\/admin\/bai-viet\/(.*)\/edit$/.test(pathname)) {
    require('./admin/bai_viet/_edit');
    return;
  }

  // Admin - Thêm quản lý bài viết
  if (/^\/admin\/bai-viet\/list$/.test(pathname)) {
    require('./admin/bai_viet/_index');
    return;
  }
  // End Admin - Bài viết

  // Admin - Trang chi tiết lịch sử bài viết
  if (/^\/admin\/lich-su-bai-viet\/(.*)\/show$/.test(pathname)) {
    require('./admin/lich_su_bai_viet/_show');
    return;
  }

  // Admin - Lịch sử bài viết
  if (/^\/admin\/lich-su-bai-viet\/(.*)$/.test(pathname)) {
    require('./admin/lich_su_bai_viet/_index');
    return;
  }

  // Admin - Trang thêm mới sản phẩm
  if (/^\/admin\/san-pham\/add$/.test(pathname)) {
    require('./admin/san_pham/_add');
    return;
  }

  // Admin - Trang sửa sản phẩm
  if (/^\/admin\/san-pham\/(.*)\/edit$/.test(pathname)) {
    require('./admin/san_pham/_edit');
    return;
  }

  // Admin - Trang quản lý sản phẩm
  if (/^\/admin\/san-pham\/list$/.test(pathname)) {
    require('./admin/san_pham/_index');
    return;
  }

  // Admin - Trang quản lý tabs
  if (/^\/admin\/tabs$/.test(pathname)) {
    require('./admin/tabs/_index');
    return;
  }

  // Admin - Trang chuyên mục sản phẩm
  if (/^\/admin\/chuyen-muc-san-pham$/.test(pathname)) {
    require('./admin/chuyen_muc_san_pham/_index');
    return;
  }

  // Admin - Nhà cung cấp
  // Admin - Trang thêm nhà cung cấp
  if (/^\/admin\/nha-cung-cap\/add$/.test(pathname)) {
    require('./admin/nha_cung_cap/_add');
    return;
  }

  // Admin - Trang sửa nhà cung cấp
  if (/^\/admin\/nha-cung-cap\/(.*)\/edit$/.test(pathname)) {
    require('./admin/nha_cung_cap/_edit');
    return;
  }

  // Admin - Trang quản lý nhà cung cấp
  if (/^\/admin\/nha-cung-cap$/.test(pathname)) {
    require('./admin/nha_cung_cap/_index');
    return;
  }
  // End Admin - Nhà cung cấp

  // Admin - Trang đại lý - cộng tác viên
  if (/^\/admin\/dai-ly-ctv$/.test(pathname)) {
    require('./admin/dai_ly_ctv/_index');
    return;
  }

  // Admin - Trang quyền - chức năng
  if (/^\/admin\/quyen-chuc-nang$/.test(pathname)) {
    require('./admin/quyen_chuc_nang/_index');
    return;
  }

  // Admin - Hoá đơn nhập hàng
  if (/^\/admin\/hoa-don-nhap-hang$/.test(pathname)) {
    require('./admin/hoa_don_nhap_hang/_index');
    return;
  }

  // Admin - Lịch sử hoá đơn nhập hàng
  if (/^\/admin\/lich-su-hoa-don-nhap-hang\/(.*)\/list$/.test(pathname)) {
    require('./admin/lich_su_hoa_don_nhap_hang/_index');
    return;
  }

  // Admin - Hoá đơn bán hàng (cộng tác viên)
  if (/^\/admin\/hoa-don-ban-hang\/cong-tac-vien$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_cong_tac_vien');
    return;
  }

  // Admin - Hoá đơn bán hàng (chưa giao hàng)
  if (/^\/admin\/hoa-don-ban-hang\/chua-giao-hang$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_chua_giao_hang');
    return;
  }

  // Admin - Hoá đơn bán hàng (Đã bị huỷ và hoàn kho)
  if (/^\/admin\/hoa-don-ban-hang\/da-bi-huy-va-hoan-kho$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_da_bi_huy_va_hoan_kho');
    return;
  }

  // Admin - Hoá đơn bán hàng (đang vận chuyển)
  if (/^\/admin\/hoa-don-ban-hang\/dang-van-chuyen$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_dang_van_chuyen');
    return;
  }

  // Admin - Hoá đơn bán hàng (COD)
  if (/^\/admin\/hoa-don-ban-hang\/khach-hang$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_khach_hang');
    return;
  }

  // Admin - Hoá đơn bán hàng (thực hiện thành công)
  if (/^\/admin\/hoa-don-ban-hang\/thuc-hien-thanh-cong$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_chung');
    // require('./admin/hoa_don_ban_hang/_thuc_hien_thanh_cong');
    return;
  }

  // Admin - Hoá đơn bán hàng (admin huỷ giao hàng)
  if (/^\/admin\/hoa-don-ban-hang\/admin-huy-giao-hang$/.test(pathname)) {
    require('./admin/hoa_don_ban_hang/_admin_huy_giao_hang');
    return;
  }

  // Admin - Nạp điểm
  if (/^\/admin\/nap-diem\/add$/.test(pathname)) {
    require('./admin/nap_diem/_add');
    return;
  }

  // Admin - Quản lý nạp điểm
  if (/^\/admin\/nap-diem\/list$/.test(pathname)) {
    require('./admin/nap_diem/_index');
    return;
  }

  // Admin - Thưởng đại lý
  if (/^\/admin\/thuong-dai-ly$/.test(pathname)) {
    require('./admin/thuong_dai_ly/_index');
    return;
  }

  // Admin - Xét duyệt thưởng đại lý
  if (/^\/admin\/xet-duyet-thuong-dai-ly$/.test(pathname)) {
    require('./admin/xet_duyet_thuong_dai_ly/_index');
    return;
  }

  // Admin - Thêm trang
  if (/^\/admin\/quan-ly-trang\/add$/.test(pathname)) {
    require('./admin/quan_ly_trang/_add');
    return;
  }

  // Admin - Sửa trang
  if (/^\/admin\/quan-ly-trang\/(.*)\/edit$/.test(pathname)) {
    require('./admin/quan_ly_trang/_edit');
    return;
  }

  // Admin -Quản lý trang
  if (/^\/admin\/quan-ly-trang\/list$/.test(pathname)) {
    require('./admin/quan_ly_trang/_index');
    return;
  }

  // Admin -Quản lý trang
  if (/^\/admin\/chon-trang-chu$/.test(pathname)) {
    require('./admin/chon_trang_chu/_index');
    return;
  }

  // Admin -Quản lý rút tiền
  if (/^\/admin\/quan-ly-rut-tien$/.test(pathname)) {
    require('./admin/quan_ly_rut_tien/_index');
    return;
  }

  // Admin - Khôi phục cộng tác viên
  if (/^\/cong-tac-vien\/recover$/.test(pathname)) {
    require('./cong_tac_vien/recover/_index');
    return;
  }

  // Admin - Thêm đơn hàng offline
  if (/^\/admin\/don-hang-offline\/add$/.test(pathname)) {
    require('./admin/don_hang_offline/_add');
    return;
  }

  // Admin - Đơn hàng offline
  if (/^\/admin\/don-hang-offline\/list$/.test(pathname)) {
    require('./admin/don_hang_offline/_index');
    return;
  }

  // Admin - Landing Page
  if (/^\/admin\/landing-page\/[0-9]+\/edit$/.test(pathname)) {
    require('./admin/landing_page/edit');
    return;
  }

  // Admin - Landing Page
  if (/^\/admin\/landing-page\/create$/.test(pathname)) {
    require('./admin/landing_page/create');
    return;
  }

  // Admin - Landing Page
  if (/^\/admin\/landing-page$/.test(pathname)) {
    require('./admin/landing_page/index');
    return;
  }

  // Admin - Landing Page - KhachHang
  if (/^\/admin\/landing-page\/khach-hang-landing-page$/.test(pathname)) {
    require('./admin/landing_page/khach_hang/_index');
    return;
  }

  // Admin - Landing Page - HoaDonBanHang
  if (/^\/admin\/landing-page\/hoa-don-ban-hang$/.test(pathname)) {
    require('./admin/landing_page/hoa_don_ban_hang/_index');
    return;
  }

  // Admin - Sản phẩm tồn kho
  if (/^\/admin\/ton-kho$/.test(pathname)) {
    require('./admin/ton_kho/_index');
    return;
  }

  // Admin - Chi tiết tồn kho
  if (/^\/admin\/ton-kho\/chi-tiet\/(.*)$/.test(pathname)) {
    require('./admin/ton_kho/_show');
    return;
  }

  // Admin - Email marketing
  if (/^\/admin\/email-marketing$/.test(pathname)) {
    require('./admin/email_marketing/_index');
    return;
  }

  // Admin - Log
  if (/^\/admin\/log$/.test(pathname)) {
    require('./admin/log/_index');
    return;
  }

  // Admin - ThongKe/Nguoi Dang Ky
  if (/^\/admin\/thong-ke\/nguoi-dang-ky\/ngay-thang-nam$/.test(pathname)) {
    require('./admin/thong_ke/nguoi_dang_ky/ngay_thang_nam/_index');
    return;
  }

  if (/^\/admin\/thong-ke\/nguoi-dang-ky\/thang-nam$/.test(pathname)) {
    require('./admin/thong_ke/nguoi_dang_ky/thang_nam/_index');
    return;
  }

  // Admin - Thống kê hoá đơn bán hàng - Ngày tháng năm
  if (/^\/admin\/thong-ke\/hoa-don-ban-hang\/ngay-thang-nam$/.test(pathname)) {
    require('./admin/thong_ke/hoa_don_ban_hang/ngay_thang_nam/_index');
    return;
  }

  // Admin - Thống kê hoá đơn bán hàng - Tháng năm
  if (/^\/admin\/thong-ke\/hoa-don-ban-hang\/thang-nam$/.test(pathname)) {
    require('./admin/thong_ke/hoa_don_ban_hang/thang_nam/_index');
    return;
  }

  // Admin - Thống kê CTV tích cực giới thiệu
  if (/^\/admin\/thong-ke\/ctv-tich-cuc-gioi-thieu$/.test(pathname)) {
    require('./admin/thong_ke/ctv_tich_cuc/_gioi_thieu');
    return;
  }

  // Admin - Thống kê CTV tích cực giới thiệu
  if (/^\/admin\/thong-ke\/ctv-tich-cuc-ban-hang$/.test(pathname)) {
    require('./admin/thong_ke/ctv_tich_cuc/_ban_hang');
    return;
  }

  // Admin - Thống kê Doanh Thu Bán Hàng
  if (/^\/admin\/thong-ke\/doanh-thu-ban-hang$/.test(pathname)) {
    require('./admin/thong_ke/doanh_thu_ban_hang/_index');
    return;
  }

  if (/^\/admin\/thong-ke\/doanh-thu-ban-hang\/(.*)$/.test(pathname)) {
    require('./admin/thong_ke/doanh_thu_ban_hang/_show');
    return;
  }

  // Admin - Trang kích hoạt link
  if (/^\/admin\/kich-hoat-link$/.test(pathname)) {
    require('./admin/kich_hoat_link/_index');
    return;
  }

  // Admin - Số điểm
  if (/^\/admin\/so-diem$/.test(pathname)) {
    require('./admin/so_diem/_index');
    return;
  }

})();
