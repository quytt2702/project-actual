<?php

Route::get('/', 'CongTacVienController@index')->name('index');

// Xác thực
Route::group(['prefix' => 'xac-thuc', 'as' => 'xac_thuc.'], function () {
    Route::get('/', 'XacThucController@index')->name('index');
    Route::get('/{hash}', 'XacThucController@adminXacThuc')->name('admin_xac_thuc');

    Route::post('/', 'XacThucController@xacThuc')->name('xac_thuc');
});

// Auth
Route::group(['as' => 'auth.', 'namespace' => 'Auth\\'], function () {
    // // Login
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');

    // Logout
    Route::get('/logout', 'LoginController@logout')->name('logout');

    // Register
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    // Route::get('/confirm', 'RegisterController@confirm')->name('confirm');
    Route::post('/register', 'RegisterController@register')->name('store');

    // Forgot password
    Route::get('/forgot', 'ForgotPasswordController@forgot')->name('forgot');
    Route::get('/recover', 'ForgotPasswordController@recover')->name('recover_password');
    Route::post('/recover', 'ForgotPasswordController@update')->name('recover');
});

// Quản lý hồ sơ
Route::group(['prefix' => 'ho-so', 'as' => 'ho_so.'], function () {
    Route::get('/', 'HoSoController@index')->name('index');


    Route::post('/upload-avatar', 'HoSoController@uploadAvatar')->name('upload_avatar');

    //change password
    Route::put('/change-password', 'HoSoController@changePassword')->name('change_password');
    Route::put('/ngan-hang', 'HoSoController@nganHang')->name('nganHang');
});

// Quản lý ngân hàng
Route::group(['prefix' => 'ngan-hang', 'as' => 'ngan_hang.'], function () {
    Route::get('/{hash}/{condition}', 'NganHangController@update')->name('update');
});

// Thưởng và link ref
Route::group(['prefix' => 'link-gioi-thieu', 'as' => 'link_gioi_thieu.'], function () {
    Route::get('/', 'LinkGioiThieuController@index')->name('index');
});

// Quản lý nạp điểm
Route::group(['prefix' => 'nap-diem', 'as' => 'nap_diem.'], function () {
    Route::get('/', 'NapDiemController@index')->name('index');
    Route::get('/table', 'NapDiemController@table')->name('table');
    Route::get('/search/{input_search}', 'NapDiemController@getSearch')->name('search');
    Route::get('/lich-su-mua-hang-bang-milk', 'NapDiemController@getLichSuMuaHangBangMilk')->name('get_lich_su_mua_hang_bang_milk');
    Route::get('/show/{id}', 'NapDiemController@show')->name('show');

    Route::post('/', 'NapDiemController@nap')->name('nap');
});

// Người giới thiệu
Route::group(['prefix' => 'nguoi-dung-lien-ket', 'as' => 'nguoi_dung_lien_ket.'], function () {
    Route::get('/', 'NguoiDungLienKetController@index')->name('index');
    Route::get('/table', 'NguoiDungLienKetController@table')->name('table');
    Route::get('/search/{input_search}', 'NguoiDungLienKetController@getSearch')->name('search');
});

// Lịch sử thưởng giới thiệu (tạm thời khoá)
// Route::group(['prefix' => 'lich-su-thuong-gioi-thieu', 'as' => 'lich_su_thuong_gioi_thieu.'], function () {
//     Route::get('/', 'LichSuThuongGioiThieuController@index')->name('index');
//     Route::get('/table', 'LichSuThuongGioiThieuController@table')->name('table');
//     Route::get('/search/{input_search}', 'LichSuThuongGioiThieuController@getSearch')->name('search');
// });

// Danh sách giới thiệu
Route::group(['prefix' => 'danh-sach-gioi-thieu', 'as' => 'danh_sach_gioi_thieu.'], function () {
    Route::get('/', 'DanhSachGioiThieuController@index')->name('index');
    Route::get('/table', 'DanhSachGioiThieuController@table')->name('table');
    Route::get('/search/{input_search}', 'DanhSachGioiThieuController@getSearch')->name('search');
});

// Mua sản phẩm
Route::group(['prefix' => 'mua-san-pham', 'as' => 'mua_san_pham.'], function () {
    Route::get('/', 'MuaSanPhamController@index')->name('index');
    Route::get('/table', 'MuaSanPhamController@table')->name('table');
    Route::get('/{id}/show', 'MuaSanPhamController@show')->name('show');
    Route::get('/{id}/modal', 'MuaSanPhamController@modal')->name('modal');
    Route::get('/search/{input_search}', 'MuaSanPhamController@getSearch')->name('search');

    Route::post('/{id}/mua-sam', 'MuaSanPhamController@muaSam')->name('mua_sam');
});

// Giỏ hàng
Route::group(['prefix' => 'gio-hang', 'as' => 'gio_hang.'], function () {
    Route::get('/', 'GioHangController@index')->name('index');
    Route::get('/list', 'GioHangController@list')->name('list');

    Route::post('/', 'GioHangController@thanhToan')->name('thanhToan');

    Route::put('/', 'GioHangController@update')->name('update');

    Route::delete('/{id}', 'GioHangController@destroy')->name('destroy');
});

// Danh sách link
Route::group(['prefix' => 'danh-sach-link', 'as' => 'danh_sach_link.'], function () {
    Route::get('/', 'DanhSachLinkController@index')->name('index');
    Route::get('/table', 'DanhSachLinkController@table')->name('table');
});

// Dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
});

// Đại lý của tôi
Route::group(['prefix' => 'dai-ly-cua-toi', 'as' => 'dai_ly_cua_toi.'], function () {
    Route::get('/', 'DaiLyCuaToiController@index')->name('index');
    Route::get('/{option}/table', 'DaiLyCuaToiController@table')->name('table');
    Route::get('/search/{input_search}', 'DaiLyCuaToiController@getSearch')->name('search');
});

// Lịch sử giao dịch
Route::group(['prefix' => 'lich-su-giao-dich', 'as' => 'lich_su_giao_dich.'], function () {
    Route::get('/', 'LichSuGiaoDichController@index')->name('index');
    // Route::get('/{option}/table', 'LichSuGiaoDichController@table')->name('table');
});

// Lịch sử thuởng đơn hàng
Route::group(['prefix' => 'lich-su-thuong-don-hang', 'as' => 'lich_su_thuong_don_hang.'], function () {
    Route::get('/', 'LichSuThuongDonHangController@index')->name('index');
    Route::get('/table', 'LichSuThuongDonHangController@table')->name('table');
    Route::get('/search/{input_search}', 'LichSuThuongDonHangController@getSearch')->name('search');
});

// Lịch sử mua hàng
Route::group(['prefix' => 'lich-su-mua-hang', 'as' => 'lich_su_mua_hang.'], function () {
    Route::get('/', 'LichSuMuaHangController@index')->name('index');
    Route::get('/table', 'LichSuMuaHangController@table')->name('table');
    Route::get('/{id}/modal', 'LichSuMuaHangController@show')->name('show');
    Route::get('/search/{input_search}', 'LichSuMuaHangController@getSearch')->name('search');
});

// Rút tiền
Route::group(['prefix' => 'rut-tien', 'as' => 'rut_tien.'], function () {
    Route::get('/', 'RutTienController@index')->name('index');
    Route::get('/table', 'RutTienController@table')->name('table');

    Route::post('/', 'RutTienController@rutTien')->name('rut_tien');

    Route::delete('/{id}', 'RutTienController@huyBo')->name('huy_bo');
});

// Chuyển đổi milk
Route::group(['prefix' => 'chuyen-doi-milk', 'as' => 'chuyen_doi_milk.'], function () {
    Route::get('/', 'ChuyenDoiMilkController@index')->name('index');
});
