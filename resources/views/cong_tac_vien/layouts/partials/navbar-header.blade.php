<nav class="navbar navbar-default navbar-static-top m-b-0">
  <div class="navbar-header">
    <div class="top-left-part">
      <a class="logo" href="{{ route('cong_tac_vien.dashboard.index') }}">
        <b>
          <img src="/template/plugins/images/admin-logo.png" alt="home" class="dark-logo" />
          <img src="/template/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
        </b>
        <span class="hidden-xs">
          <img src="/template/plugins/images/admin-text.png" alt="home" class="dark-logo" />
          <img src="/template/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
        </span>
      </a>
    </div>
    <ul class="nav navbar-top-links navbar-left">
      <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
    </ul>
    <ul class="nav navbar-top-links navbar-right pull-right active">
      <li id="profile" class="dropdown">
        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="true"> <img src="{{ Auth::guard('cong_tac_vien')->user()->avatar }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::guard('cong_tac_vien')->user()->ho_va_ten }}</b><span class="caret"></span> </a>
        <ul class="dropdown-menu dropdown-user animated flipInY">
          <li>
            <div class="dw-user-box">
              <div class="u-img"><img src="{{ Auth::guard('cong_tac_vien')->user()->avatar }}" alt="user"></div>
              <div class="u-text"><h4>{{ Auth::guard('cong_tac_vien')->user()->ho_va_ten }}</h4><p class="text-muted">{{ Auth::guard('cong_tac_vien')->user()->email }}</p>
                {{-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
              </div>
            </div>
          </li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ route('cong_tac_vien.ho_so.index') }}"><i class="ti-user"></i> Hồ sơ của tôi</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ route('cong_tac_vien.danh_sach_gioi_thieu.index') }}"><i class="ti-world"></i> Link của tôi</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ route('cong_tac_vien.auth.logout') }}"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<script>
  $('#profile').on('click', function () {
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
    } else {
      $(this).addClass('open');
    }
  });
</script>
