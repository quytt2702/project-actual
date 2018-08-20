<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        // Admin
        $this->app->bind(\App\Repositories\Contracts\TabRepository::class, \App\Repositories\Eloquents\TabRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\UrlRepository::class, \App\Repositories\Eloquents\UrlRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogRepository::class, \App\Repositories\Eloquents\LogRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\WardRepository::class, \App\Repositories\Eloquents\WardRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NgonNguRepository::class, \App\Repositories\Eloquents\NgonNguRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\BaiVietRepository::class, \App\Repositories\Eloquents\BaiVietRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\SanPhamRepository::class, \App\Repositories\Eloquents\SanPhamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\GioHangRepository::class, \App\Repositories\Eloquents\GioHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ProvinceRepository::class, \App\Repositories\Eloquents\ProvinceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChucNangRepository::class, \App\Repositories\Eloquents\ChucNangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NganHangRepository::class, \App\Repositories\Eloquents\NganHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TmdtPageRepository::class, \App\Repositories\Eloquents\TmdtPageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\DistrictRepository::class, \App\Repositories\Eloquents\DistrictRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NguoiDungRepository::class, \App\Repositories\Eloquents\NguoiDungRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChuyenMucRepository::class, \App\Repositories\Eloquents\ChuyenMucRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NhomQuyenRepository::class, \App\Repositories\Eloquents\NhomQuyenRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogThuongRepository::class, \App\Repositories\Eloquents\LogThuongRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TinhThanhRepository::class, \App\Repositories\Eloquents\TinhThanhRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\KhachHangRepository::class, \App\Repositories\Eloquents\KhachHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\NhaCungCapRepository::class, \App\Repositories\Eloquents\NhaCungCapRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\CodeNapDiemRepository::class, \App\Repositories\Eloquents\CodeNapDiemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\CongTacVienRepository::class, \App\Repositories\Eloquents\CongTacVienRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TmdtSectionRepository::class, \App\Repositories\Eloquents\TmdtSectionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LichSuBaiVietRepository::class, \App\Repositories\Eloquents\LichSuBaiVietRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\QuyenChucNangRepository::class, \App\Repositories\Eloquents\QuyenChucNangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TienNguoiDungRepository::class, \App\Repositories\Eloquents\TienNguoiDungRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\HoaDonBanHangRepository::class, \App\Repositories\Eloquents\HoaDonBanHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogRutTienVNDRepository::class, \App\Repositories\Eloquents\LogRutTienVNDRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogThuongDaiLyRepository::class, \App\Repositories\Eloquents\LogThuongDaiLyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\HoaDonNhapHangRepository::class, \App\Repositories\Eloquents\HoaDonNhapHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChuyenMucSanPhamRepository::class, \App\Repositories\Eloquents\ChuyenMucSanPhamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogThuongDonHangRepository::class, \App\Repositories\Eloquents\LogThuongDonHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\KhachHangDangNhapRepository::class, \App\Repositories\Eloquents\KhachHangDangNhapRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogHoaDonNhapHangRepository::class, \App\Repositories\Eloquents\LogHoaDonNhapHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogThuongGioiThieuRepository::class, \App\Repositories\Eloquents\LogThuongGioiThieuRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogTaiKhoanNganHangRepository::class, \App\Repositories\Eloquents\LogTaiKhoanNganHangRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\PhanTramThuongDaiLyRepository::class, \App\Repositories\Eloquents\PhanTramThuongDaiLyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogThuongLandingPageRepository::class, \App\Repositories\Eloquents\LogThuongLandingPageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\KhachHangLandingPageRepository::class, \App\Repositories\Eloquents\KhachHangLandingPageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository::class, \App\Repositories\Eloquents\ChiTietHoaDonBanSanPhamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\ChiTietHoaDonNhapSanPhamRepository::class, \App\Repositories\Eloquents\ChiTietHoaDonNhapSanPhamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\LogLichSuNapDiemBangCardRepository::class, \App\Repositories\Eloquents\LogLichSuNapDiemBangCardRepositoryEloquent::class);

        $this->app->bind(\App\Repositories\Contracts\Admin\AdminRepository::class, \App\Repositories\Eloquents\Admin\AdminRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\Admin\CaiDatRepository::class, \App\Repositories\Eloquents\Admin\CaiDatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\Admin\CaiDatNgonNguRepository::class, \App\Repositories\Eloquents\Admin\CaiDatNgonNguRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\SoDiemRepository::class, \App\Repositories\Eloquents\SoDiemRepositoryEloquent::class);
        //:end-bindings:
    }
}
