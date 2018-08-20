<?php

Route::get('/test-abc', function (\App\Services\NganLuongService $service) {
    $response = $service->checkOut([]);

    dd($response->getResponse());
});

Route::get('/phieu-nhap', function () {
    return view('phieu_nhap_xuat.phieu_nhap');
})->name('phieu_nhap');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Test
Route::get('/test', 'TestController@index');
Route::post('/test', 'TestController@post');

// Home Test
Route::get('/', 'HomeController@index')->name('index');
Route::post('/admin/validate', 'HomeController@check')->name('admin.validate');

// Upload Test
Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
    Route::post('images', 'UploadController@images')->name('images');
});

Route::group(['prefix' => 'landing', 'as' => 'landing.'], function () {
    Route::get('transcend', 'LandsController@transcend')->name('transcend');
    Route::get('robotics', 'LandsController@robotics')->name('robotics');
    Route::get('landing', 'LandsController@landing')->name('landing');
    Route::get('glint', 'LandsController@glint')->name('glint');
    Route::get('ca', 'LandsController@ca')->name('ca');
});

// Auth
Route::group(['as' => 'auth.', 'namespace' => 'Auth\\'], function () {
    // Login
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');

    // Logout
    Route::get('/logout', 'LoginController@logout')->name('logout');

    // Register
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::get('/confirm', 'RegisterController@confirm')->name('confirm');
    Route::post('/register', 'RegisterController@register')->name('store');
});

// Xac thuc
Route::group(['prefix' => 'xac-thuc', 'as' => 'xac_thuc.'], function () {
    Route::get('/nguoi-dung', 'XacThucController@nguoiDung')->name('nguoi_dung');
    Route::post('/nguoi-dung', 'XacThucController@xacThuc')->name('nguoi_dung');
    // Route::get('/nguoi-dung', function() {
    //     dd('asd');
    // })->name('nguoi_dung');
    Route::get('/admin', 'XacThucController@admin')->name('admin');
});

Route::get('/{ur}', 'UrlController@navigate')->name('url.navigate');

// Giỏ hàng
Route::group(['prefix' => 'gio-hang', 'as' => 'xac_thuc.'], function () {
    Route::get('/chon-kieu-thanh-toan-modal', 'GioHangController@chonKieuThanhToanModal')->name('chon_kieu_thanh_toan_modal');

    Route::post('/', 'GioHangController@store')->name('store');
    Route::post('/thanh-toan', 'GioHangController@thanhToan')->name('thanh_toan');
    Route::post('/chi-tiet-thanh-toan-modal/{kieu_thanh_toan}', 'GioHangController@chiTietThanhToanModal')->name('get_chi_tiet_thanh_toan_modal');

    Route::delete('/xoa-san-pham/{id}', 'GioHangController@destroy')->name('destroy');
});

// Khách hàng
Route::group(['prefix' => 'khach-hang', 'as' => 'khach_hang.'], function () {
    Route::get('/thong-bao-modal', 'KhachHangController@thongBaoModal')->name('thong_bao_modal');
    Route::get('/chi-tiet-thanh-toan-modal', 'KhachHangController@chiTietThanhToanModal')->name('get_chi_tiet_thanh_toan_modal');

    Route::post('/thanh-toan', 'KhachHangController@thanhToan')->name('thanh_toan');
});

// Địa chỉ
Route::group(['prefix' => 'dia-chi', 'as' => 'dia_chi.'], function () {
    Route::get('/thanh-pho', 'DiaChiController@thanhPho')->name('thanh_pho');
    Route::get('/thanh-pho/search/{key}', 'DiaChiController@searchThanhPho')->name('thanh_pho');
    Route::get('/quan/search/{code}/{key}', 'DiaChiController@searchQuan')->name('search_quan');
    Route::get('/phuong/search/{code}/{key}', 'DiaChiController@searchPhuong')->name('search_phuong');

    Route::get('/add/quan/{id}', 'DiaChiController@loadQuan')->name('load_quan');
    Route::get('/add/phuong/{id}', 'DiaChiController@loadPhuong')->name('load_phuong');
});
