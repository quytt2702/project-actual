<?php

use Illuminate\Database\Seeder;

class NguoiDungSeeder extends Seeder
{
    public function run()
    {
        DB::table('nguoi_dung')->insert([
            'ho_va_ten'         => 'Tên Tao Là Đây',
            'email'             => 'nguyenvanday@gmail.com',
            'sdt'               => '012312321332',
            'facebook'          => 'www.facebook.com/tranvanday',
            'ngay_sinh'         => '1996-11-04',
            'cmnd'              => '213218937',
            'dia_chi_cmnd'      => 'Đà Nẵng Quảng Nam',
            'ten_chu_tai_khoan' => '',
            'gioi_tinh'         => 'Nam',
            'password'          => bcrypt('123123123'),
            'so_tai_khoan'      => '20012345675',
            'ten_chi_nhanh'     => 'VIB chi nhánh ABC',
            'dia_chi_hien_tai'  => 'Đà Nẵng Việt Nam',
            'id_nhom_quyen'     => 1,
            'id_ngan_hang'      => 1,
            'txid'              => '47f6ae9e-c77a-48e4-93d4-f07cb858385c'
        ]);
    }
}
