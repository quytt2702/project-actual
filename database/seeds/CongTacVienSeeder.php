<?php

use Illuminate\Database\Seeder;

class CongTacVienSeeder extends Seeder
{
    public function run()
    {
        DB::table('cong_tac_vien')->insert([
            [
                'ho_va_ten' => 'Trần Văn A',
                'email' => 'tranvana@gmail.com',
                'so_dien_thoai' => '0111111111111',
                'facebook' => 'www.facebook.com/tranvana',
                'ngay_sinh' => '1996-11-04',
                'cmnd' => '111111111',
                'dia_chi_cmnd' => 'Địa chỉ: 111',
                'ten_chu_tai_khoan' => 'Tran Van A',
                'gioi_tinh' => 'Nam',
                'password' => bcrypt('123123123'),
                'so_tai_khoan' => 'Số tài khoản: 111',
                'ten_chi_nhanh' => 'VIB chi nhánh 111',
                'dia_chi_hien_tai' => 'Địa chỉ hiện tại: 111',
                'id_ngan_hang' => 1,
                'txid' => '19173b30-e588-452d-86df-53a9217d9b11',
                'is_kich_hoat' => 'DONE',
                'is_dai_ly' => 'YES',
                'email_dai_ly_quan_ly' => null,
            ], [
                'ho_va_ten' => 'Trần Văn B',
                'email' => 'tranvanb@gmail.com',
                'so_dien_thoai' => '022222222222',
                'facebook' => 'www.facebook.com/tranvana',
                'ngay_sinh' => '1996-11-04',
                'cmnd' => '22222222222',
                'dia_chi_cmnd' => 'Địa chỉ: 222222',
                'ten_chu_tai_khoan' => 'Tran Van B',
                'gioi_tinh' => 'Nam',
                'password' => bcrypt('123123123'),
                'so_tai_khoan' => 'Số tài khoản: 222',
                'ten_chi_nhanh' => 'VIB chi nhánh 222',
                'dia_chi_hien_tai' => 'Địa chỉ hiện tại: 222',
                'id_ngan_hang' => 2,
                'txid' => '29173b30-e588-452d-86df-53a9217d9b12',
                'is_kich_hoat' => 'NOT YET',
                'is_dai_ly' => 'NO',
                'email_dai_ly_quan_ly' => null,
            ], [
                'ho_va_ten' => 'Trần Văn C',
                'email' => 'tranvanc@gmail.com',
                'so_dien_thoai' => '03333333333333',
                'facebook' => 'www.facebook.com/tranvanc',
                'ngay_sinh' => '1996-11-04',
                'cmnd' => '33333333333333',
                'dia_chi_cmnd' => 'Địa chỉ: 3333',
                'ten_chu_tai_khoan' => 'Tran Van C',
                'gioi_tinh' => 'Nam',
                'password' => bcrypt('123123123'),
                'so_tai_khoan' => 'Số tài khoản: 333',
                'ten_chi_nhanh' => 'VIB chi nhánh 333',
                'dia_chi_hien_tai' => 'Địa chỉ hiện tại: 333',
                'id_ngan_hang' => 1,
                'txid' => '39173b30-e588-452d-86df-53a9217d9b13',
                'is_kich_hoat' => 'DONE',
                'is_dai_ly' => 'NO',
                'email_dai_ly_quan_ly' => 'tranvand@gmail.com',
            ], [
                'ho_va_ten' => 'Trần Văn D',
                'email' => 'tranvand@gmail.com',
                'so_dien_thoai' => '04444444444444',
                'facebook' => 'www.facebook.com/tranvand',
                'ngay_sinh' => '1996-11-04',
                'cmnd' => '444444',
                'dia_chi_cmnd' => 'Địa chỉ: 4444',
                'ten_chu_tai_khoan' => 'Tran Van D',
                'gioi_tinh' => 'Nam',
                'password' => bcrypt('123123123'),
                'so_tai_khoan' => 'Số tài khoản: 444',
                'ten_chi_nhanh' => 'VIB chi nhánh 333',
                'dia_chi_hien_tai' => 'Địa chỉ hiện tại: 333',
                'id_ngan_hang' => 1,
                'txid' => '39173b30-e588-452d-86df-53a9217d9b14',
                'is_kich_hoat' => 'DONE',
                'is_dai_ly' => 'YES',
                'email_dai_ly_quan_ly' => null,
            ],
        ]);

        $now = now();
        DB::table('tien_nguoi_dung')->insert([
            'email' => 'tranvana@gmail.com',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $arrSanPham = [
            [
                'id'                            => 1,
                'san_pham_ma'                   => 'ban-dung',
                'san_pham_ten'                  => 'Bàn dựng',
                'san_pham_gia_ban_ao'           => 200,
                'san_pham_gia_ban_thuc_te'      => 50000,
                'san_pham_keyword'              => null,
                'san_pham_mo_ta'                => null,
                'san_pham_tags'                 => 'tag_ban',
                'san_pham_url'                  => 'ban-dung',
                'san_pham_hinh_dai_dien'        => '/ckfinder/userfiles/images/IMG_3303.png',
                'san_pham_id_chuyen_muc'        => '["1","2"]',
                'id_ngon_ngu'                   => 1,
            ],
            [
                'id'                            => 2,
                'san_pham_ma'                   => 'ghe-ngoi',
                'san_pham_ten'                  => 'Ghế ngồi',
                'san_pham_gia_ban_ao'           => 800,
                'san_pham_gia_ban_thuc_te'      => 80000,
                'san_pham_keyword'              => null,
                'san_pham_mo_ta'                => null,
                'san_pham_tags'                 => 'tag_ghe',
                'san_pham_url'                  => 'ghe-ngoi',
                'san_pham_hinh_dai_dien'        => '/ckfinder/userfiles/images/IMG_3303.png',
                'san_pham_id_chuyen_muc'        => '["1","2","3"]',
                'id_ngon_ngu'                   => 1,
                'san_pham_so_luong'             => 2,
                'san_pham_hinh_anh_slide'       => null
            ]
        ];

        foreach ($arrSanPham as $sanPham) {
            DB::table('san_pham')->insert($sanPham);
        }
    }
}
