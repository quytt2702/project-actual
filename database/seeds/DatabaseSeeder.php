<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UrlSeeder::class);
        $this->call(TabsSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(NgonNguSeeder::class);
        $this->call(NganHangSeeder::class);
        $this->call(ChucNangSeeder::class);
        $this->call(NguoiDungSeeder::class);
        $this->call(NhomQuyenSeeder::class);
        $this->call(ChuyenMucSeeder::class);
        $this->call(TinhThanhSeeder::class);
        $this->call(NhaCungCapSeeder::class);
        $this->call(CongTacVienSeeder::class);
        $this->call(CaiDatChungSeeder::class);
        $this->call(TmdtSectionSeeder::class);
        $this->call(CaiDatNgonNguSeeder::class);
        $this->call(ChuyenMucSanPhamSeeder::class);
        $this->call(UrlCodeNapTienSeeder::class);

        // Landing Themes
        $this->call(ThemeSeeder::class);
    }
}
