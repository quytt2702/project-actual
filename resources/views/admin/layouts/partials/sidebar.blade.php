<style>
  .arrow {
    margin-top: -5px;
  }
</style>
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav slimscrollsidebar">
    <div class="sidebar-head">
      <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
    </div>
    <ul class="nav" id="side-menu">
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-info fa-fw"></i> <span class="hide-menu">Thông tin Website<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.dich_vu_khach_hang.index') }}" class="waves-effect"><span class="hide-menu">Dịch vụ khách hàng</span></a></li>
          <li><a href="{{ route('admin.dieu_khoan_su_dung.index') }}" class="waves-effect"><span class="hide-menu">Điều khoản sử dụng</span></a></li>
          <li><a href="{{ route('admin.gioi_thieu_lavion.index') }}" class="waves-effect"><span class="hide-menu">Giới thiệu Lavion</span></a></li>
          <li><a href="{{ route('admin.hoi_va_dap.index') }}" class="waves-effect"><span class="hide-menu">Hỏi và đáp</span></a></li>
          <li><a href="{{ route('admin.mo_hinh_kinh_doanh.index') }}" class="waves-effect"><span class="hide-menu">Mô hình kinh doanh</span></a></li>
          <li><a href="{{ route('admin.thong_tin_lien_he.index') }}" class="waves-effect"><span class="hide-menu">Thông tin liên hệ</span></a></li>
        </ul>
      </li>
{{--       <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-image fa-fw"></i> <span class="hide-menu">Quản lý Logo Lavion<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
        </ul>
      </li> --}}
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-info-circle fa-fw"></i> <span class="hide-menu">Thông tin đối tác<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.ngan_hang.index') }}" class="waves-effect"><span class="hide-menu">Ngân hàng</span></a></li>
          <li><a href="{{ route('admin.nha_cung_cap.index') }}" class="waves-effect"><span class="hide-menu">Nhà cung cấp</span></a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-trademark fa-fw"></i> <span class="hide-menu">Thương mại điện tử<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.quan_ly_trang.index') }}" class="waves-effect"><span class="hide-menu">Quản lý trang</span></a></li>
          <li><a href="{{ route('admin.quan_ly_trang.add') }}" class="waves-effect"><span class="hide-menu">Thêm mới trang</span></a></li>
          <li><a href="{{ route('admin.chon_trang_chu.index') }}" class="waves-effect"><span class="hide-menu">Chọn trang chủ</span></a></li>
          <li><a href="{{ route('admin.tabs.index') }}" class="waves-effect"><span class="hide-menu">Quản lý tabs</span></a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-wrench fa-fw"></i> <span class="hide-menu">Cài đặt thông số website<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.cai_dat.index') }}" class="waves-effect"><span class="hide-menu">Cài đặt chung</span></a></li>
          <li><a href="{{ route('admin.ngon_ngu.index') }}" class="waves-effect"><span class="hide-menu">Ngôn Ngữ</span></a></li>
          <li><a href="{{ route('admin.nhom_quyen.index') }}" class="waves-effect"><span class="hide-menu">Phân quyền người dùng</span></a></li>
          <li><a href="{{ route('admin.cai_dat_ngon_ngu.index') }}" class="waves-effect"><span class="hide-menu">Thông số sử dụng web</span></a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-clipboard fa-fw"></i> <span class="hide-menu">Quản trị nội dung<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.chinh_sach_ban_hang.index') }}" class="waves-effect"><span class="hide-menu">Chính sách bán hàng</span></a></li>
          <li><a href="{{ route('admin.chinh_sach_bao_hanh.index') }}" class="waves-effect"><span class="hide-menu">Chính sách bảo hành</span></a></li>
          <li><a href="{{ route('admin.chinh_sach_bao_mat.index') }}" class="waves-effect"><span class="hide-menu">Chính sách bảo mật</span></a></li>
          <li><a href="{{ route('admin.chinh_sach_doi_hang.index') }}" class="waves-effect"><span class="hide-menu">Chính sách đổi hàng</span></a></li>
          <li><a href="{{ route('admin.chinh_sach_giao_hang.index') }}" class="waves-effect"><span class="hide-menu">Chính sách giao hàng</span></a></li>
          <li><a href="{{ route('admin.chinh_sach_thanh_toan.index') }}" class="waves-effect"><span class="hide-menu">Chính sách thanh toán</span></a></li>
          <li><a href="{{ route('admin.chuyen_muc.index') }}" class="waves-effect"><span class="hide-menu">Chuyên mục bài viết</span></a></li>
          <li><a href="{{ route('admin.bai_viet.index') }}" class="waves-effect"><span class="hide-menu">Quản lý bài viết</span></a></li>
          <li><a href="/cktemplate/ckfinder/ckfinder.html" target="_blank" rel="noopener noreferrer" class="waves-effect"><span class="hide-menu">Thư viện hình ảnh</span></a></li>
          <li><a href="{{ route('admin.bai_viet.add') }}" class="waves-effect"><span class="hide-menu">Viết bài mới</span></a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-list-alt fa-fw"></i> <span class="hide-menu">Sản phẩm<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.chuyen_muc_san_pham.index') }}" class="waves-effect"><span class="hide-menu">Chuyên mục sản phẩm</span></a></li>
          <li><a href="{{ route('admin.san_pham.add') }}" class="waves-effect"><span class="hide-menu">Đăng sản phẩm</span></a></li>
          <li><a href="{{ route('admin.san_pham.index') }}" class="waves-effect"><span class="hide-menu">Quản lý sản phẩm</span></a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-user fa-fw"></i> <span class="hide-menu">Cộng tác viên<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.chinh_sach_ctv.index') }}" class="waves-effect"><span class="hide-menu">Chính sách Cộng tác viên</span></a></li>
          <li><a href="{{ route('admin.chuong_trinh_ctv_online.index') }}" class="waves-effect"><span class="hide-menu">Chương trình CTV Online</span></a></li>
          {{-- <li><a href="" class="waves-effect"><span class="hide-menu">Chương trình thi đua CTV</span></a></li> --}}
          <li><a href="{{ route('admin.cong_tac_vien.index') }}" class="waves-effect"><span class="hide-menu">Danh sách CTV</span></a></li>
          <li><a href="{{ route('admin.thong_ke.ctv_tich_cuc_gioi_thieu.index') }}" class="waves-effect"><span class="hide-menu">CTV tích cực giới thiệu</span></a></li>
          <li><a href="{{ route('admin.thong_ke.ctv_tich_cuc_ban_hang.index') }}" class="waves-effect"><span class="hide-menu">CTV tích cực bán hàng</span></a></li>
          <li><a href="{{ route('admin.xac_thuc.index') }}" class="waves-effect"><span class="hide-menu">Duyệt CTV mới</span></a></li>
          <li><a href="{{ route('admin.dieu_khoan_va_hop_dong_ctv.index') }}" class="waves-effect"><span class="hide-menu">Điều khoản và hợp đồng CTV</span></a></li>
          <li><a href="{{ route('admin.kich_hoat_link.index') }}" class="waves-effect"><span class="hide-menu">Kích hoạt link</span></a></li>
          <li><a href="{{ route('admin.thong_ke.nguoi_dang_ky.ngay_thang_nam') }}" class="waves-effect"><span class="hide-menu">Người ĐK (Ngày, tháng, năm)</span></a></li>
          <li><a href="{{ route('admin.thong_ke.nguoi_dang_ky.thang_nam') }}" class="waves-effect"><span class="hide-menu">Người ĐK (Tháng, năm)</span></a></li>
          <li><a href="{{ route('admin.cong_tac_vien.thong_ke_thu_nhap') }}" class="waves-effect"><span class="hide-menu">Thống kê thu nhập CTV</span></a></li>
        </ul>
      </li>



         {{--  <li><a href="{{ route('admin.dai_ly_ctv.index') }}" class="waves-effect"><span class="hide-menu">Đại lý - Cộng tác viên</span></a></li>
          <li><a href="{{ route('admin.nang_cap_thanh_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Nâng cấp thành đại lý</span></a></li>
          <li><a href="{{ route('admin.chuyen_muc.index') }}" class="waves-effect"><span class="hide-menu">Chuyên mục bài viết</span></a></li>
 --}}



{{--           <li><a href="{{ route('admin.chuong_trinh_ctv_online.index') }}" class="waves-effect"><span class="hide-menu">Chương trình ctv online</span></a></li>
          <li><a href="{{ route('admin.dieu_khoan_va_hop_dong_ctv.index') }}" class="waves-effect"><span class="hide-menu">Điều khoản và hợp đồng ctv</span></a></li>
          <li><a href="{{ route('admin.code_nap_tien.index') }}" class="waves-effect"><span class="hide-menu">Code nạp tiền</span></a></li>
 --}}


      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-users fa-fw"></i> <span class="hide-menu">Đại Lý Lavion<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.phan_tram_thuong_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Chính sách đại lý</span></a></li>
          <li><a href="{{ route('admin.quan_ly_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Danh sách Đại lý</span></a></li>
          <li><a href="{{ route('admin.thuong_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Thưởng đại lý</span></a></li>
          <li><a href="{{ route('admin.dai_ly_ctv.index') }}" class="waves-effect"><span class="hide-menu">Đại lý - Cộng tác viên</span></a></li>
          <li><a href="{{ route('admin.nang_cap_thanh_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Nâng cấp thành đại lý</span></a></li>

        </ul>
      </li>

      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-calculator fa-fw"></i> <span class="hide-menu">Kế Toán Lavion<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.hoa_don_nhap_hang.index') }}" class="waves-effect"><span class="hide-menu">Nhập sản phẩm</span></a></li>
          <li><a href="{{ route('admin.don_hang_offline.add') }}" class="waves-effect"><span class="hide-menu">Xuất sản phẩm</span></a></li>
          <li><a href="{{ route('admin.don_hang_offline.index') }}" class="waves-effect"><span class="hide-menu">Quản lý đơn Offline</span></a></li>
          <li><a href="{{ route('admin.xet_duyet_thuong_dai_ly.index') }}" class="waves-effect"><span class="hide-menu">Thưởng đại lý</span></a></li>
          <li><a href="{{ route('admin.ton_kho.index') }}" class="waves-effect"><span class="hide-menu">Quản lý SP Tồn kho</span></a></li>
          <li><a href="{{ route('admin.code_nap_tien.index') }}" class="waves-effect"><span class="hide-menu">Quản lý Nạp tiền qua TK</span></a></li>
          <li><a href="{{ route('admin.quan_ly_rut_tien.index') }}" class="waves-effect"><span class="hide-menu">Quản lý rút tiền CTV</span></a></li>
          {{-- <li><a href="" class="waves-effect"><span class="hide-menu">Quản lý Công Nợ</span></a></li> --}}
          {{-- <li><a href="" class="waves-effect"><span class="hide-menu">Quản lý doanh thu bán hàng</span></a></li> --}}
          <li><a href="{{ route('admin.hoa_don_ban_hang.cong_tac_vien') }}" class="waves-effect"><span class="hide-menu">Quản lý Đơn hàng CTV</span></a></li>
          <li><a href="{{ route('admin.hoa_don_ban_hang.khach_hang') }}" class="waves-effect"><span class="hide-menu">Quản lý Đơn hàng khách hàng</span></a></li>
          <li><a href="{{ route('admin.hoa_don_ban_hang.dang_van_chuyen') }}" class="waves-effect"><span class="hide-menu">Đơn hàng Đang vận chuyển</span></a></li>
          <li><a href="{{ route('admin.hoa_don_ban_hang.da_bi_huy_va_hoan_kho') }}" class="waves-effect"><span class="hide-menu">Đơn hàng Bị huỷ và hoàn kho</span></a></li>
          <li><a href="{{ route('admin.hoa_don_ban_hang.thuc_hien_thanh_cong') }}" class="waves-effect"><span class="hide-menu">Đơn hàng Thực hiện thành công</span></a></li>
          <li><a href="{{ route('admin.thong_ke.hoa_don_ban_hang.ngay_thang_nam') }}" class="waves-effect"><span class="hide-menu">Hóa đơn bán hàng (Ngày, Tháng, Năm)</span></a></li>
          <li><a href="{{ route('admin.thong_ke.hoa_don_ban_hang.thang_nam') }}" class="waves-effect"><span class="hide-menu">Hóa đơn bán hàng (Tháng, năm)</span></a></li>
        </ul>
      </li>

      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-tags fa-fw"></i> <span class="hide-menu">Quản lý Thẻ MILK<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.nap_diem.index') }}" class="waves-effect"><span class="hide-menu">Danh sách thẻ đã tạo</span></a></li>
          <li><a href="{{ route('admin.so_diem.index') }}" class="waves-effect"><span class="hide-menu">Loại code nạp</span></a></li>
          <li><a href="{{ route('admin.nap_diem.add') }}" class="waves-effect"><span class="hide-menu">Thêm code nạp điểm</span></a></li>
        </ul>
      </li>

      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-newspaper-o fa-fw"></i> <span class="hide-menu">Landing Page<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.landing_page.index') }}" class="waves-effect"><span class="hide-menu">Quản lý web</span></a></li>
          <li><a href="{{ route('admin.landing_page.create') }}" class="waves-effect"><span class="hide-menu">Tạo web mới</span></a></li>
          <li><a href="{{ route('admin.landing_page.khach_hang_landing_page.index') }}" class="waves-effect"><span class="hide-menu">Khách hàng landing page</span></a></li>
          <li><a href="{{ route('admin.landing_page.hoa_don_ban_hang.index') }}" class="waves-effect"><span class="hide-menu">Hóa đơn bán hàng landing page</span></a></li>
        </ul>
      </li>
      <li><a href="{{ route('admin.email_marketing.index') }}" class="waves-effect"><i class="fa fa-paper-plane fa-fw"></i><span class="hide-menu">Email Marketing, tin nhắn</span></a></li>
{{--       <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-plus-circle fa-fw"></i> <span class="hide-menu">Khác<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.nguoi_dung.index') }}" class="waves-effect"><span class="hide-menu">Người dùng</span></a></li>
          <li><a href="{{ route('admin.admin.index') }}" class="waves-effect"><span class="hide-menu">Admin</span></a></li>
        </ul>
      </li> --}}

     {{--  <li><a href="{{ route('admin.ton_kho.index') }}" class="waves-effect"><i class="fa fa-check-square fa-fw"></i> <span class="hide-menu">Tồn kho</span></a></li>
      <li>
        <a href="javascript:" class="waves-effect"><i class="fa fa-clipboard fa-fw"></i> <span class="hide-menu">Bài viết<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('admin.bai_viet.index') }}" class="waves-effect"><span class="hide-menu">Quản lý bài viết</span></a></li>
        --}}

      <li><a href="{{ route('admin.auth.logout') }}" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">Đăng xuất</span></a></li>
    </ul>
  </div>
</div>
