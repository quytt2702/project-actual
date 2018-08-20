<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav slimscrollsidebar">
    <div class="sidebar-head">
      <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
    </div>
    <ul class="nav" id="side-menu">
      <li><a href="{{ route('cong_tac_vien.dashboard.index') }}"><i class="ti-wallet fa-fw"></i> Bảng thông tin</a></li>
      <li><a href="{{ route('cong_tac_vien.ho_so.index') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw"></i> <span class="hide-menu"></span>Hồ sơ đại lý online</a></li>
      <li><a href="{{ route('cong_tac_vien.link_gioi_thieu.index') }}" class="waves-effect"><i class="fa fa-link fa-fw"></i> <span class="hide-menu"></span>Link giới thiệu đại lý</a></li>
      <li><a href="{{ route('cong_tac_vien.danh_sach_link.index') }}" class="waves-effect"><i class="fa fa-money fa-fw"></i> <span class="hide-menu"></span>Link bán sản phẩm</a></li>
      <li><a href="{{ route('cong_tac_vien.lich_su_giao_dich.index') }}" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"></i> <span class="hide-menu"></span>Lịch sử giao dịch</a></li>
      <li><a href="{{ route('cong_tac_vien.lich_su_thuong_don_hang.index') }}" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"></i> <span class="hide-menu"></span>Lịch sử bán hàng</a></li>
      <li><a href="{{ route('cong_tac_vien.lich_su_mua_hang.index') }}" class="waves-effect"><i class="fa fa-link fa-fw"></i> <span class="hide-menu"></span>Lịch sử mua hàng</a></li>
      <li><a href="{{ route('cong_tac_vien.nap_diem.index') }}" class="waves-effect"><i class="fa fa-plus fa-fw"></i> <span class="hide-menu"></span>Lịch sử nạp milk</a></li>
      <li><a href="{{ route('cong_tac_vien.rut_tien.index') }}" class="waves-effect"><i class="fa fa-plus fa-fw"></i> <span class="hide-menu"></span>Lịch sử rút tiền</a></li>
      <li><a href="{{ route('cong_tac_vien.danh_sach_gioi_thieu.index') }}" class="waves-effect"><i class="fa fa-list-ul fa-fw"></i> <span class="hide-menu"></span>Danh sách AFFILIATE</a></li>
      <li><a href="{{ route('cong_tac_vien.gio_hang.index') }}" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"></i> <span class="hide-menu"></span>Giỏ hàng đại lý</a></li>
      <li><a href="{{ route('cong_tac_vien.mua_san_pham.index') }}" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"></i> <span class="hide-menu"></span>Đại lý tự mua hàng</a></li>

      {{-- <li><a href="{{ route('cong_tac_vien.nguoi_dung_lien_ket.index') }}" class="waves-effect"><i class="fa fa-users fa-fw"></i> <span class="hide-menu"></span>Người dùng liên kết</a></li> --}}
      {{-- <li><a href="{{ route('cong_tac_vien.lich_su_thuong_gioi_thieu.index') }}" class="waves-effect"><i class="fa fa-history fa-fw"></i> <span class="hide-menu"></span>Lịch sử thưởng giới thiệu</a></li> --}}
      @if( Auth::guard('cong_tac_vien')->user()->is_dai_ly === 'YES')
        <li><a href="{{ route('cong_tac_vien.dai_ly_cua_toi.index') }}" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"></i> <span class="hide-menu"></span>Quản lý thành viên</a></li>
      @endif
      <li><a href="{{ route('cong_tac_vien.auth.logout') }}" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu"></span>Đăng xuất</a></li>
    </ul>
  </div>
</div>
