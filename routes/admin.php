<?php

// Giới thiệu Lavion
Route::group(['prefix' => 'gioi-thieu-lavion', 'as' => 'gioi_thieu_lavion.'], function () {
    Route::get('/', 'ThongTinWebController@gioiThieuLavion')->name('index');
    Route::put('/', 'ThongTinWebController@editGioiThieuLavion')->name('update');
});

// Chính sách bán hàng
Route::group(['prefix' => 'chinh-sach-ban-hang', 'as' => 'chinh_sach_ban_hang.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachBanHang')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachBanHang')->name('update');
});

// Chính sách bảo hành
Route::group(['prefix' => 'chinh-sach-bao-hanh', 'as' => 'chinh_sach_bao_hanh.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachBaoHanh')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachBaoHanh')->name('update');
});

// Chính sách bảo mật
Route::group(['prefix' => 'chinh-sach-bao-mat', 'as' => 'chinh_sach_bao_mat.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachBaoMat')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachBaoMat')->name('update');
});

// Chính sách đổi hàng
Route::group(['prefix' => 'chinh-sach-doi-hang', 'as' => 'chinh_sach_doi_hang.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachDoiHang')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachDoiHang')->name('update');
});

// Chính sách giao hàng
Route::group(['prefix' => 'chinh-sach-giao-hang', 'as' => 'chinh_sach_giao_hang.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachGiaoHang')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachGiaoHang')->name('update');
});

// Chính sách thanh toán
Route::group(['prefix' => 'chinh-sach-thanh-toan', 'as' => 'chinh_sach_thanh_toan.'], function () {
    Route::get('/', 'ThongTinWebController@chinhSachThanhToan')->name('index');
    Route::put('/', 'ThongTinWebController@editChinhSachThanhToan')->name('update');
});

// Chương trình CTV - online
Route::group(['prefix' => 'chuong-trinh-ctv-online', 'as' => 'chuong_trinh_ctv_online.'], function () {
    Route::get('/', 'ThongTinWebController@chuongTrinhCTVOnline')->name('index');
    Route::put('/', 'ThongTinWebController@editChuongTrinhCTVOnline')->name('update');
});

// Dịch vụ khách hàng
Route::group(['prefix' => 'dich-vu-khach-hang', 'as' => 'dich_vu_khach_hang.'], function () {
    Route::get('/', 'ThongTinWebController@dichVuKhachHang')->name('index');
    Route::put('/', 'ThongTinWebController@editDichVuKhachHang')->name('update');
});

// Điều khoản sử dụng
Route::group(['prefix' => 'dieu-khoan-su-dung', 'as' => 'dieu_khoan_su_dung.'], function () {
    Route::get('/', 'ThongTinWebController@dieuKhoanSuDung')->name('index');
    Route::put('/', 'ThongTinWebController@editDieuKhoanSuDung')->name('update');
});

// Điều khoản và hợp đồng CTV
Route::group(['prefix' => 'dieu-khoan-va-hop-dong-ctv', 'as' => 'dieu_khoan_va_hop_dong_ctv.'], function () {
    Route::get('/', 'ThongTinWebController@dieuKhoanVaHopDongCTV')->name('index');
    Route::put('/', 'ThongTinWebController@editDieuKhoanVaHopDongCTV')->name('update');
});

// Hỏi và đáp
Route::group(['prefix' => 'hoi-va-dap', 'as' => 'hoi_va_dap.'], function () {
    Route::get('/', 'ThongTinWebController@hoiVaDap')->name('index');
    Route::put('/', 'ThongTinWebController@editHoiVaDap')->name('update');
});

// Mô hình kinh doanh
Route::group(['prefix' => 'mo-hinh-kinh-doanh', 'as' => 'mo_hinh_kinh_doanh.'], function () {
    Route::get('/', 'ThongTinWebController@moHinhKinhDoanh')->name('index');
    Route::put('/', 'ThongTinWebController@editMoHinhKinhDoanh')->name('update');
});

// Thông tin liên hệ
Route::group(['prefix' => 'thong-tin-lien-he', 'as' => 'thong_tin_lien_he.'], function () {
    Route::get('/', 'ThongTinWebController@thongTinLienHe')->name('index');
    Route::put('/', 'ThongTinWebController@editThongTinLienHe')->name('update');
});

// Code nap tien
Route::group(['prefix' => 'code-nap-tien', 'as' => 'code_nap_tien.'], function () {
    Route::get('/', 'ThongTinWebController@codeNapTien')->name('index');
    Route::put('/', 'ThongTinWebController@editCodeNapTien')->name('update');
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

// Quản lý trang Landing Page
Route::group(['prefix' => 'landing-page', 'as' => 'landing_page.'], function () {
    Route::get('/list', 'LandingPageController@index')->name('index');
    Route::get('/create', 'LandingPageController@create')->name('create');
    Route::get('/{theme}/preview', 'LandingPageController@preview')->name('preview');
    Route::get('/{theme}/edit', 'LandingPageController@edit')->name('edit');
    Route::get('/hoa-don-ban-hang/{txid}/in', 'LandingPageController@inHoaDonBanHang')->name('in_hoa_don_ban_hang');
    Route::group(['prefix' => 'khach-hang-landing-page', 'as' => 'khach_hang_landing_page.'], function () {
        Route::get('/', 'LandingPageController@indexKhachHang')->name('index');
        Route::get('/table', 'LandingPageController@tableKhachHang')->name('table');
    });

    Route::group(['prefix' => 'hoa-don-ban-hang', 'as' => 'hoa_don_ban_hang.'], function () {
        Route::get('/', 'LandingPageController@indexHoadon')->name('index');
        Route::get('/table', 'LandingPageController@tableHoaDon')->name('table');
        Route::get('/table/{id}', 'LandingPageController@showHoaDon')->name('show');
    });

    Route::post('/preview', 'LandingPageController@postPreview')->name('preview.post');
    Route::post('/section/view', 'LandingPageController@getSectionView')->name('section.view');
    Route::post('/check-url', 'LandingPageController@checkUrl')->name('check_url');

    Route::put('/{theme}', 'LandingPageController@update')->name('update');

    Route::delete('/{theme}', 'LandingPageController@destroy')->name('destroy');
});

// Quản lý ngân hàng
Route::group(['prefix' => 'ngan-hang', 'as' => 'ngan_hang.'], function () {
    Route::get('/', 'NganHangController@index')->name('index');
    Route::get('/table', 'NganHangController@table')->name('table');
    Route::get('/{id}/edit-modal', 'NganHangController@editModal')->name('edit_modal');

    Route::post('/', 'NganHangController@store')->name('store');

    Route::put('/{id}', 'NganHangController@update')->name('update');

    Route::delete('/{id}', 'NganHangController@destroy')->name('destroy');
});

// Quản lý phần trăm thưởng đại lý
Route::group(['prefix' => 'phan-tram-thuong-dai-ly', 'as' => 'phan_tram_thuong_dai_ly.'], function () {
    Route::get('/', 'PhanTramThuongDaiLyController@index')->name('index');
    Route::get('/table', 'PhanTramThuongDaiLyController@table')->name('table');
    Route::get('/{id}/edit-modal', 'PhanTramThuongDaiLyController@editModal')->name('edit_modal');

    Route::post('/', 'PhanTramThuongDaiLyController@store')->name('store');

    Route::put('/{id}', 'PhanTramThuongDaiLyController@update')->name('update');

    Route::delete('/{id}', 'PhanTramThuongDaiLyController@destroy')->name('destroy');
});

// Quản lý cài đặt ngôn ngữ
Route::group(['prefix' => 'cai-dat-ngon-ngu', 'as' => 'cai_dat_ngon_ngu.'], function () {
    Route::get('/', 'CaiDatNgonNguController@index')->name('index');
    Route::get('/{ngon_ngu}/menu-doc', 'CaiDatNgonNguController@menuDoc')->name('menu_doc');
    Route::get('/{ngon_ngu}/menu-ngang', 'CaiDatNgonNguController@menuNgang')->name('menu_ngang');
    Route::get('/{ngon_ngu}/{menu}/noi-dung-footer', 'CaiDatNgonNguController@noiDungMenuFooter')->name('noi_dung_menu_footer');
    Route::get('/{url}/search', 'CaiDatNgonNguController@searchUrl')->name('search_url');
    Route::get('/{ngon_ngu}/table', 'CaiDatNgonNguController@table')->name('table');
    Route::get('/{ngon_ngu}/slider', 'CaiDatNgonNguController@slider')->name('slider');

    Route::post('/{ngon_ngu}/menu-doc', 'CaiDatNgonNguController@storeMenuDoc')->name('store_menu_doc');
    Route::post('/{ngon_ngu}/ten-menu-doc', 'CaiDatNgonNguController@storeTenMenuDoc')->name('store_ten_menu_doc');
    Route::post('/{ngon_ngu}/menu-ngang', 'CaiDatNgonNguController@storeMenuNgang')->name('store_menu_ngang');
    Route::post('/{ngon_ngu}/thong-so-footer', 'CaiDatNgonNguController@storeThongSoFooter')->name('store_thong_so_footer');
    Route::post('/{ngon_ngu}/{menu}/noi-dung-footer', 'CaiDatNgonNguController@storeNoiDungFooter')->name('store_noi_dung_footer');
    Route::post('/{ngon_ngu}/slider', 'CaiDatNgonNguController@storeSlider')->name('store_slider');

    Route::put('/{ngon_ngu}', 'CaiDatNgonNguController@edit')->name('edit');
    Route::put('/{ngon_ngu}/update-slider', 'CaiDatNgonNguController@editSlider')->name('edit_slider');

    Route::delete('/{ngon_ngu}/{url}/xoa-menu-doc', 'CaiDatNgonNguController@xoaMenuDoc')->name('xoa_menu_doc');
    Route::delete('/{ngon_ngu}/{menu}/{url}/xoa-menu-footer', 'CaiDatNgonNguController@xoaMenuFooter')->name('xoa_menu_footer');
    Route::delete('/{ngon_ngu}/{url}/xoa-slider', 'CaiDatNgonNguController@xoaSlider')->name('xoa_slider');
});

// Quản lý ngôn ngữ
Route::group(['prefix' => 'ngon-ngu', 'as' => 'ngon_ngu.'], function () {
    Route::get('/', 'NgonNguController@index')->name('index');
    Route::get('/table', 'NgonNguController@table')->name('table');
    Route::get('/{key}/{idNgonNgu}/search', 'NgonNguController@search')->name('table');

    Route::post('/', 'NgonNguController@store')->name('store');
    Route::post('/active', 'NgonNguController@active')->name('active');
    Route::post('/not-active', 'NgonNguController@notActive')->name('not_active');
});

// Quản lý người dùng
Route::group(['prefix' => 'nguoi-dung', 'as' => 'nguoi_dung.'], function () {
    Route::get('/', 'NguoiDungController@index')->name('index');
    Route::get('/table', 'NguoiDungController@table')->name('table');
    Route::get('/add', 'NguoiDungController@add')->name('add');
    Route::get('/{txid}/edit', 'NguoiDungController@edit')->name('edit');
    Route::get('/{txid}/show', 'NguoiDungController@show')->name('show');
    Route::get('/search/{input_search}', 'NguoiDungController@getSearch')->name('search');
    Route::get('/download', 'NguoiDungController@downExcel')->name('download');

    Route::post('/', 'NguoiDungController@store')->name('store');
    Route::post('/{txid}/edit', 'NguoiDungController@update')->name('update');

    Route::delete('/{txid}/delete', 'NguoiDungController@destroy')->name('delete');

    Route::get('/search', 'NguoiDungController@getSearch');
});

// Quản lý chuyên mục bài viết
Route::group(['prefix' => 'chuyen-muc-bai-viet', 'as' => 'chuyen_muc.'], function () {
    Route::get('/', 'ChuyenMucController@index')->name('index');
    Route::get('/table', 'ChuyenMucController@table')->name('table');
    Route::get('/{id}/edit-modal', 'ChuyenMucController@editModal')->name('edit_modal');

    Route::post('/', 'ChuyenMucController@store')->name('store');

    Route::put('/{id}', 'ChuyenMucController@update')->name('edit');

    Route::delete('/{id}', 'ChuyenMucController@destroy')->name('destroy');
});

// Quản lý chuyên mục sản phẩm
Route::group(['prefix' => 'chuyen-muc-san-pham', 'as' => 'chuyen_muc_san_pham.'], function () {
    Route::get('/', 'ChuyenMucSanPhamController@index')->name('index');
    Route::get('/table', 'ChuyenMucSanPhamController@table')->name('table');
    Route::get('/{id}/edit-modal', 'ChuyenMucSanPhamController@editModal')->name('edit_modal');

    Route::post('/', 'ChuyenMucSanPhamController@store')->name('store');

    Route::put('/{id}', 'ChuyenMucSanPhamController@update')->name('edit');

    // Route::delete('/{id}', 'ChuyenMucSanPhamController@destroy')->name('destroy');
});

// Quản lý sản phẩm
Route::group(['prefix' => 'san-pham', 'as' => 'san_pham.'], function () {
    Route::get('/list', 'SanPhamController@index')->name('index');
    Route::get('/add', 'SanPhamController@add')->name('add');
    Route::get('/list/{condition}', 'SanPhamController@list')->name('list');
    Route::get('/search/{input_search}/{condition}', 'SanPhamController@getSearch')->name('get_search');
    Route::get('/{id}/edit', 'SanPhamController@edit')->name('edit');
    Route::get('/{key}/search', 'SanPhamController@search')->name('search');

    Route::post('/', 'SanPhamController@store')->name('store');

    Route::put('/{id}/duyet', 'SanPhamController@duyet')->name('duyet');
    Route::put('/{id}/restore', 'SanPhamController@restore')->name('restore');
    Route::put('/{id}/edit', 'SanPhamController@update')->name('update');

    Route::delete('/{id}/delete', 'SanPhamController@destroy')->name('destroy');
});

// Quản lý nhóm quyền
Route::group(['prefix' => 'nhom-quyen', 'as' => 'nhom_quyen.'], function () {
    Route::get('/', 'NhomQuyenController@index')->name('index');
    Route::get('/table', 'NhomQuyenController@table')->name('table');

    Route::post('/', 'NhomQuyenController@store')->name('store');
    Route::post('/{id}/edit-modal', 'NhomQuyenController@editModal')->name('edit_modal');

    Route::put('/{id}', 'NhomQuyenController@edit')->name('edit');

    Route::delete('/{id}', 'NhomQuyenController@destroy')->name('destroy');
});

// Quản lý cộng tác viên
Route::group(['prefix' => 'cong-tac-vien', 'as' => 'cong_tac_vien.'], function () {
    Route::get('/list', 'CongTacVienController@index')->name('index');
    Route::get('/table', 'CongTacVienController@table')->name('table');
    Route::get('/{txid}/edit', 'CongTacVienController@edit')->name('edit');
    Route::get('/{txid}/show', 'CongTacVienController@show')->name('show');
    Route::get('/{txid}/login', 'CongTacVienController@login')->name('login');
    Route::get('/search/{input_search}', 'CongTacVienController@getSearch')->name('search');
    Route::get('/thong-ke-thu-nhap', 'CongTacVienController@thongKeThuNhap')->name('thong_ke_thu_nhap');
    Route::get('/thong-ke-thu-nhap/table/{thang}/{nam}', 'CongTacVienController@tableThongKeThuNhap')->name('table_thong_ke_thu_nhap');
    Route::get('/download', 'CongTacVienController@downExcel')->name('download');

    Route::put('/{txid}/edit', 'CongTacVienController@update')->name('update');
    Route::put('/{txid}/block', 'CongTacVienController@block')->name('block');

    Route::delete('/{txid}/delete', 'CongTacVienController@destroy')->name('delete');
});

// Quản lý xác thực
Route::group(['prefix' => 'xac-thuc', 'as' => 'xac_thuc.'], function () {
    Route::get('/', 'XacThucController@index')->name('index');
    Route::get('/table', 'XacThucController@table')->name('table');
    Route::get('/{hash}/show', 'XacThucController@show')->name('show');
    Route::get('/search/{input_search}', 'XacThucController@getSearch')->name('search');
    Route::get('/download', 'XacThucController@downExcel')->name('download');

    Route::put('/{hash}/duyet', 'XacThucController@duyet')->name('duyet');
    Route::put('/{hash}/khong-duyet', 'XacThucController@khongDuyet')->name('khong_duyet');

    Route::delete('/{txid}/delete', 'XacThucController@destroy')->name('delete');
});

// Quản lý quản lý tabs
Route::group(['prefix' => 'tabs', 'as' => 'tabs.'], function () {
    Route::get('/', 'TabsController@index')->name('index');
    Route::get('/table', 'TabsController@table')->name('table');

    Route::put('/{id}/edit-name', 'TabsController@editName')->name('edit_name');
    Route::put('/{id}/edit-status', 'TabsController@editStatus')->name('edit_status');
});

// Quản lý bài viết
Route::group(['prefix' => 'bai-viet', 'as' => 'bai_viet.'], function () {
    Route::get('/list', 'BaiVietController@index')->name('index');
    Route::get('/add', 'BaiVietController@add')->name('add');
    Route::get('/list/{condition}', 'BaiVietController@list')->name('list');
    Route::get('/{id}/edit', 'BaiVietController@edit')->name('edit');
    Route::get('/search/{input_search}/{condition}', 'BaiVietController@getSearch')->name('search');

    Route::post('/', 'BaiVietController@store')->name('store');

    Route::put('/{id}/duyet', 'BaiVietController@duyet')->name('duyet');
    Route::put('/{id}/restore', 'BaiVietController@restore')->name('restore');
    Route::put('/{id}/update', 'BaiVietController@update')->name('update');

    Route::delete('/{id}/delete', 'BaiVietController@destroy')->name('destroy');
});

// Quản lý lịch sử bài viết
Route::group(['prefix' => 'lich-su-bai-viet', 'as' => 'lich_su_bai_viet.'], function () {
    Route::get('/{id}', 'LichSuBaiVietController@index')->name('index');
    Route::get('/{id}/list', 'LichSuBaiVietController@list')->name('list');
    Route::get('/{id}/show', 'LichSuBaiVietController@show')->name('show');

    Route::post('/{id}/restore', 'LichSuBaiVietController@restore')->name('restore');
});

// Quản lý nhà cung cấp
Route::group(['prefix' => 'nha-cung-cap', 'as' => 'nha_cung_cap.'], function () {
    Route::get('/', 'NhaCungCapController@index')->name('index');
    Route::get('/add', 'NhaCungCapController@add')->name('add');
    Route::get('/list/{condition}', 'NhaCungCapController@list')->name('list');
    Route::get('/{id}/edit', 'NhaCungCapController@edit')->name('edit');
    Route::get('/search/{input_search}/{condition}', 'NhaCungCapController@getSearch')->name('search');

    Route::post('/', 'NhaCungCapController@store')->name('store');

    Route::put('/{id}/restore', 'NhaCungCapController@restore')->name('restore');
    Route::put('/{id}/update', 'NhaCungCapController@update')->name('update');

    Route::delete('/{id}/delete', 'NhaCungCapController@destroy')->name('destroy');
});

// Quản lý đại lý - cộng tác viên
Route::group(['prefix' => 'dai-ly-ctv', 'as' => 'dai_ly_ctv.'], function () {
    Route::get('/', 'DaiLyCTVController@index')->name('index');
    Route::get('/get-tab/{email}/{condition}', 'DaiLyCTVController@getTab')->name('get_tab');


    Route::put('/{email}/{email_nguoi_dung}', 'DaiLyCTVController@update')->name('update');
});

// Quản lý quyền - chức năng
Route::group(['prefix' => 'quyen-chuc-nang', 'as' => 'quyen_chuc_nang.'], function () {
    Route::get('/', 'QuyenChucNangController@index')->name('index');
    Route::get('/get-chuc-nang/{quyen_id}', 'QuyenChucNangController@getChucNang')->name('chuc_nang');

    Route::put('/{quyen_id}/{chuc_nang_id}', 'QuyenChucNangController@update')->name('update');
});

// Quản lý nhân viên hệ thống
Route::group(['prefix' => 'nhan-vien-he-thong', 'as' => 'nhan_vien_he_thong.'], function () {
    Route::get('/list', 'NhanVienHeThongController@index')->name('index');
    Route::get('/table', 'NhanVienHeThongController@table')->name('table');
    Route::get('/add', 'NhanVienHeThongController@add')->name('add');

    Route::post('/', 'NhanVienHeThongController@store')->name('store');
    Route::post('/{id}/edit-modal', 'NhanVienHeThongController@editModal')->name('edit_modal');

    Route::put('/{email}', 'NhanVienHeThongController@edit')->name('edit');
    Route::put('/{id}/block', 'NhanVienHeThongController@block')->name('block');

    Route::delete('/{id}', 'NhanVienHeThongController@destroy')->name('destroy');
});

// Quản lý cài đặt
Route::group(['prefix' => 'cai-dat-chung', 'as' => 'cai_dat.'], function () {
    Route::get('/', 'CaiDatController@index')->name('index');

    Route::put('/', 'CaiDatController@edit')->name('edit');
});

// Quản lý chính sách ctv
Route::group(['prefix' => 'chinh-sach-ctv', 'as' => 'chinh_sach_ctv.'], function () {
    Route::get('/', 'ChinhSachCTVController@index')->name('index');

    Route::put('/', 'ChinhSachCTVController@edit')->name('edit');
});

// Quản lý hoá đơn nhập hàng
Route::group(['prefix' => 'hoa-don-nhap-hang', 'as' => 'hoa_don_nhap_hang.'], function () {
    Route::get('/', 'HoaDonNhapHangController@index')->name('index');
    Route::get('/add', 'HoaDonNhapHangController@add')->name('add');
    Route::get('/list', 'HoaDonNhapHangController@list')->name('list');
    Route::get('/{id}/edit-modal', 'HoaDonNhapHangController@editModal')->name('edit_modal');
    Route::get('/chi-tiet/{id_don_hang}', 'HoaDonNhapHangController@chiTiet')->name('chi_tiet');


    Route::post('/', 'HoaDonNhapHangController@store')->name('store');

    Route::put('/{id}/update', 'HoaDonNhapHangController@update')->name('update');

    Route::delete('/{id}', 'HoaDonNhapHangController@destroy')->name('destroy');
});

// Quản lý lịch sử hoá đơn nhập hàng
Route::group(['prefix' => 'lich-su-hoa-don-nhap-hang', 'as' => 'lich_su_hoa_don_nhap_hang.'], function () {
    Route::get('/{id_don_hang}/list', 'LichSuHoaDonNhapHangController@index')->name('index');
    Route::get('/chi-tiet/{ngay_thay_doi}', 'LichSuHoaDonNhapHangController@chiTiet')->name('chi_tiet');
});

// Quản lý hoá đơn bán hàng
Route::group(['prefix' => 'hoa-don-ban-hang', 'as' => 'hoa_don_ban_hang.'], function () {
    Route::get('/cong-tac-vien', 'HoaDonBanHangController@congTacVien')->name('cong_tac_vien');
    Route::get('/cong-tac-vien/table', 'HoaDonBanHangController@getCongTacVienTable')->name('cong_tac_vien_table');
    Route::get('/chua-giao-hang', 'HoaDonBanHangController@chuaGiaoHang')->name('chua_giao_hang');
    Route::get('/chua-giao-hang/table', 'HoaDonBanHangController@getChuaGiaoHangTable')->name('chua_giao_hang_table');
    Route::get('/da-bi-huy-va-hoan-kho', 'HoaDonBanHangController@daBiHuyVaHoanKho')->name('da_bi_huy_va_hoan_kho');
    Route::get('/da-bi-huy-va-hoan-kho/table', 'HoaDonBanHangController@getDaBiHuyVaHoanKhoTable')->name('da_bi_huy_va_hoan_kho_table');
    Route::get('/dang-van-chuyen', 'HoaDonBanHangController@dangVanChuyen')->name('dang_van_chuyen');
    Route::get('/dang-van-chuyen/table', 'HoaDonBanHangController@getDangVanChuyenTable')->name('dang_van_chuyen_table');
    Route::get('/thuc-hien-thanh-cong', 'HoaDonBanHangController@thucHienThanhCong')->name('thuc_hien_thanh_cong');
    Route::get('/thuc-hien-thanh-cong/table', 'HoaDonBanHangController@getThucHienThanhCongTable')->name('thuc_hien_thanh_cong_table');
    // Route::get('/admin-huy-giao-hang', 'HoaDonBanHangController@adminHuyGiaoHang')->name('admin_huy_giao_hang');
    // Route::get('/admin-huy-giao-hang/table', 'HoaDonBanHangController@adminHuyGiaoHangTable')->name('admin_huy_giao_hang_table');
    Route::get('/khach-hang', 'HoaDonBanHangController@COD')->name('khach_hang');
    Route::get('/khach-hang/table', 'HoaDonBanHangController@getCodTable')->name('get_khach_hang_table');
    Route::get('/cong-tac-vien/trang-thai/{id}', 'HoaDonBanHangController@getTrangThai')->name('get_trang_thai');
    Route::get('/cong-tac-vien/{id}/chi-tiet', 'HoaDonBanHangController@getChiTiet')->name('get_chi_tiet');
    Route::get('/{hash}/in', 'HoaDonBanHangController@inHoaDonBanHang')->name('in_hoa_don_ban_hang');


    Route::put('/cong-tac-vien/xac-nhan-giao-hang/{id}', 'HoaDonBanHangController@xacNhanGiaoHang')->name('xac_nhan_giao_hang');
    Route::put('/cong-tac-vien/trang-thai/{id}/{trang_thai}', 'HoaDonBanHangController@thayDoiTrangThai')->name('thay_doi_trang_thai');
});

// Quản lý nạp điểm
Route::group(['prefix' => 'nap-diem', 'as' => 'nap_diem.'], function () {
    Route::get('/list', 'NapDiemController@index')->name('index');
    Route::get('/add', 'NapDiemController@add')->name('add');
    Route::get('/table', 'NapDiemController@table')->name('table');
    Route::get('/table/{dotTaoMa}', 'NapDiemController@viewTable')->name('view_table');
    Route::get('/table/data', 'NapDiemController@anyData')->name('anyData');
    Route::get('/search/{input_search}', 'NapDiemController@getSearch')->name('search');

    Route::post('/add', 'NapDiemController@store')->name('store');

    Route::put('/{dotTaoMa}', 'NapDiemController@update')->name('update');
    Route::put('/kich-hoat/{id}', 'NapDiemController@kichHoat')->name('kich_hoat');
});

// Quản lý đại lý
Route::group(['prefix' => 'quan-ly-dai-ly', 'as' => 'quan_ly_dai_ly.'], function () {
    Route::get('/', 'QuanLyDaiLyController@index')->name('index');
    Route::get('/table', 'QuanLyDaiLyController@table')->name('table');
    Route::get('/search/{input_search}', 'QuanLyDaiLyController@getSearch')->name('search');

    Route::put('/{email}', 'QuanLyDaiLyController@huyQuyen')->name('huyQuyen');
});

// Nâng cấp thành đại lý
Route::group(['prefix' => 'nang-cap-thanh-dai-ly', 'as' => 'nang_cap_thanh_dai_ly.'], function () {
    Route::get('/', 'NangCapThanhDaiLyController@index')->name('index');
    Route::get('/table', 'NangCapThanhDaiLyController@table')->name('table');
    Route::get('/search/{input_search}', 'NangCapThanhDaiLyController@getSearch')->name('search');

    Route::put('/{email}', 'NangCapThanhDaiLyController@nangCap')->name('nangCap');
});

// Quản lý logo
Route::group(['prefix' => 'logo', 'as' => 'logo.'], function () {
    Route::get('/', 'LogoController@index')->name('index');

    Route::post('/', 'LogoController@store')->name('store');
});

// Thưởng đại lý
Route::group(['prefix' => 'thuong-dai-ly', 'as' => 'thuong_dai_ly.'], function () {
    Route::get('/', 'ThuongDaiLyController@index')->name('index');
    Route::get('/tim-kiem/{content}', 'ThuongDaiLyController@timKiem')->name('tim_kiem');
    Route::get('/xem/{thang}/{nam}', 'ThuongDaiLyController@xem')->name('xem');
});

// Xét duyệt thưởng đại lý
Route::group(['prefix' => 'xet-duyet-thuong-dai-ly', 'as' => 'xet_duyet_thuong_dai_ly.'], function () {
    Route::get('/', 'XetDuyetThuongDaiLyController@index')->name('index');
    Route::post('/', 'XetDuyetThuongDaiLyController@thuong')->name('thuong');
});

// Tạo trang mới
Route::group(['prefix' => 'quan-ly-trang', 'as' => 'quan_ly_trang.'], function () {
    Route::get('/list', 'QuanLyTrangController@index')->name('index');
    Route::get('/table', 'QuanLyTrangController@table')->name('table');
    Route::get('/add', 'QuanLyTrangController@add')->name('add');
    Route::get('/{id}/edit', 'QuanLyTrangController@edit')->name('edit');
    Route::get('/search/{input_search}', 'QuanLyTrangController@getSearch')->name('search');

    Route::post('/them-section/{code}', 'QuanLyTrangController@themSection')->name('them_section');
    Route::post('/', 'QuanLyTrangController@store')->name('store');

    Route::put('/{id}', 'QuanLyTrangController@update')->name('update');
    Route::put('/{id}/change-view', 'QuanLyTrangController@changeView')->name('change_view');

    Route::delete('/{id}/destroy', 'QuanLyTrangController@destroy')->name('destroy');
});

// Chọn trang chủ
Route::group(['prefix' => 'chon-trang-chu', 'as' => 'chon_trang_chu.'], function () {
    Route::get('/', 'ChonTrangChuController@index')->name('index');
    Route::get('/table', 'ChonTrangChuController@table')->name('table');
    Route::get('/search/{input_search}', 'ChonTrangChuController@getSearch')->name('search');

    Route::put('/{url}', 'ChonTrangChuController@store')->name('store');
});

// Quản lý rút tiền
Route::group(['prefix' => 'quan-ly-rut-tien', 'as' => 'quan_ly_rut_tien.'], function () {
    Route::get('/', 'QuanLyRutTienController@index')->name('index');
    Route::get('/table/{tinh_trang}', 'QuanLyRutTienController@table')->name('table');
    Route::get('/{id}/get-huy-bo-modal', 'QuanLyRutTienController@getHuyBoModal')->name('get_huy_bo_modal');

    Route::put('/{id}/dong-y', 'QuanLyRutTienController@dongY')->name('dong_y');
    Route::put('/{id}/huy-bo', 'QuanLyRutTienController@huyBo')->name('huy_bo');
});

// Tồn kho
Route::group(['prefix' => 'ton-kho', 'as' => 'ton_kho.'], function () {
    Route::get('/', 'TonKhoController@index')->name('index');
    Route::get('/table', 'TonKhoController@table')->name('table');
    Route::get('/table/{search}', 'TonKhoController@search')->name('search');

    Route::get('/chi-tiet/{id}', 'TonKhoController@chiTiet')->name('chi_tiet');
    Route::get('/chi-tiet/{id}/table', 'TonKhoController@tableChiTiet')->name('table_chi_tiet');
    Route::get('/chi-tiet/{id}/table/{search}', 'TonKhoController@searchDetail')->name('search_chi_tiet');
});

// Tạo đơn hàng offline
Route::group(['prefix' => 'don-hang-offline', 'as' => 'don_hang_offline.'], function () {
    Route::get('/list', 'DonHangOfflineController@index')->name('index');
    Route::get('/table', 'DonHangOfflineController@table')->name('table');
    Route::get('/add', 'DonHangOfflineController@add')->name('add');

    Route::post('/', 'DonHangOfflineController@store')->name('store');

    Route::delete('/{id}', 'DonHangOfflineController@destroy')->name('destroy');
});


// Log
Route::group(['prefix' => 'log', 'as' => 'log.'], function () {
    Route::get('/', 'LogController@index')->name('index');
    Route::get('/table', 'LogController@table')->name('table');
});

// Thống kê
Route::group(['prefix' => 'thong-ke', 'as' => 'thong_ke.'], function () {
    Route::group(['prefix' => 'nguoi-dang-ky', 'as' => 'nguoi_dang_ky.'], function () {
        Route::get('ngay-thang-nam', 'ThongKeController@ngayThangNam')->name('ngay_thang_nam');
        Route::get('ngay-thang-nam/table-ngay-thang-nam/{dateStart}/{dateEnd}', 'ThongKeController@tableNgayThangNam')->name('table_ngay_thang_nam');
        Route::get('thang-nam', 'ThongKeController@thangNam')->name('thang_nam');
        Route::get('thang-nam/table-thang-nam/{date}', 'ThongKeController@tableThangNam')->name('table_thang_nam');
        Route::get('thang-nam/sider-bar/{dateStart}/{dateEnd}', 'ThongKeController@sidebarNguoiDangKy')->name('siderbar');
    });

    Route::group(['prefix' => 'hoa-don-ban-hang', 'as' => 'hoa_don_ban_hang.'], function () {
        Route::get('ngay-thang-nam', 'ThongKeController@hoaDonNgayThangNam')->name('ngay_thang_nam');
        Route::get('ngay-thang-nam/table-ngay-thang-nam/{dateStart}/{dateEnd}', 'ThongKeController@tableHoaDonNgayThangNam')->name('table_ngay_thang_nam');
        Route::get('thang-nam', 'ThongKeController@hoaDonThangNam')->name('thang_nam');
        Route::get('thang-nam/table-thang-nam/{date}', 'ThongKeController@tableThangNamHoaDon')->name('table_thang_nam');
        Route::get('thang-nam/sider-bar/{dateStart}/{dateEnd}', 'ThongKeController@sidebarHoaDon')->name('siderbar');

        Route::get('ngay-thang-nam/{id}', 'ThongKeController@show')->name('show');
    });

    Route::group(['prefix' => 'ctv-tich-cuc-gioi-thieu', 'as' => 'ctv_tich_cuc_gioi_thieu.'], function () {
        route::get('/', 'ThongKeController@ctvTichCucGioiThieu')->name('index');
        route::get('/table/{thang}/{nam}', 'ThongKeController@tableCTVTichCucGioiThieu')->name('table');
    });

    Route::group(['prefix' => 'ctv-tich-cuc-ban-hang', 'as' => 'ctv_tich_cuc_ban_hang.'], function () {
        route::get('/', 'ThongKeController@ctvTichCucBanHang')->name('index');
        route::get('/table/{thang}/{nam}', 'ThongKeController@tableCTVTichCucBanHang')->name('table');
    });

    Route::group(['prefix' => 'doanh-thu-ban-hang', 'as' => 'doanh_thu_ban_hang.'], function () {
        Route::get('/', 'ThongKeController@doanhThuBanHang')->name('index');
        Route::get('/table/{thang}/{nam}', 'ThongKeController@tableDoanhThuBanHang')->name('table');

        Route::get('/{id}', 'ThongKeController@chiTiet')->name('chi_tiet');
        Route::get('/{id}/show', 'ThongKeController@tableChiTiet')->name('chi_tiet_table');
    });
});

// Số điểm
Route::group(['prefix' => 'so-diem', 'as' => 'so_diem.'], function () {
    Route::get('/', 'SoDiemController@index')->name('index');
    Route::get('/table', 'SoDiemController@table')->name('table');
    Route::get('/edit/{id}', 'SoDiemController@edit')->name('edit');

    Route::post('/store', 'SoDiemController@store')->name('store');

    Route::put('/update/{id}', 'SoDiemController@update')->name('update');
    Route::put('/kick-hoat/{id}', 'SoDiemController@kickHoat')->name('kick_hoat');

    Route::delete('/destroy/{id}', 'SoDiemController@destroy')->name('destroy');
});

// Email marketing
Route::group(['prefix' => 'email-marketing', 'as' => 'email_marketing.'], function () {
    Route::get('/', 'EmailMarketingController@index')->name('index');
    Route::get('/cong-tac-vien/da-xac-thuc', 'EmailMarketingController@ctvDaXacThuc')->name('ctv_da_xac_thuc');
    Route::get('/cong-tac-vien/tat-ca', 'EmailMarketingController@ctvTatCa')->name('ctv_tat_ca');
    Route::get('/cong-tac-vien/dai-ly', 'EmailMarketingController@daiLy')->name('dai_ly');
    Route::get('/khach-hang', 'EmailMarketingController@khachHang')->name('khach_hang');
});

// Kích hoạt link
Route::group(['prefix' => 'kich-hoat-link', 'as' => 'kich_hoat_link.'], function () {
    Route::get('/', 'KichHoatLinkController@index')->name('index');
    Route::get('/table', 'KichHoatLinkController@table')->name('table');
    Route::get('/search/{input_search}', 'KichHoatLinkController@getSearch')->name('search');

    Route::put('/{url}/edit', 'KichHoatLinkController@update')->name('update');
});
