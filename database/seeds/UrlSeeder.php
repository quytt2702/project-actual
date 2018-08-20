<?php

use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        DB::table('url')->insert([
            ['url_url' => 'gioi-thieu-lavion',           'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Giới thiệu Lavivon',         'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'thong-tin-lien-he',           'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Thông tin liên hệ',          'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dieu-khoan-su-dung',          'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Điều khoản sử dụng',         'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'mo-hinh-kinh-doanh',          'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Mô hình kinh doanh',         'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dich-vu-khach-hang',          'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Dịch vụ khách hàng',         'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'hoi-va-dap',                  'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Hỏi và đáp',                 'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-ban-hang',         'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách bán hàng',        'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-bao-mat',          'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách bảo mật',         'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-giao-hang',        'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách giao hàng',       'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-doi-hang',         'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách đổi hàng',        'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-bao-hanh',         'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách bảo hành',        'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chinh-sach-thanh-toan',       'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chính sách thanh toán',      'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'chuong-trinh-ctv-online',     'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Chương trình CTV Online',    'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dieu-khoan-va-hop-dong-ctv',  'url_ten_loai' => 'THONG TIN WEB', 'url_noi_dung' => 'Điều khoản và hợp đồng CTV', 'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dang-nhap',                   'url_ten_loai' => 'DEFAULT',       'url_noi_dung' => '',                           'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dang-ky',                     'url_ten_loai' => 'DEFAULT',       'url_noi_dung' => '',                           'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'dang-xuat',                   'url_ten_loai' => 'DEFAULT',       'url_noi_dung' => '',                           'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'gio-hang',                    'url_ten_loai' => 'DEFAULT',       'url_noi_dung' => '',                           'created_at' => $now, 'updated_at' => $now],
        ]);

        // More
        DB::table('url')->insert([
            ['url_url' => 'ban-dung', 'url_ten_loai' => 'SAN PHAM', 'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'ghe-ngoi', 'url_ten_loai' => 'SAN PHAM', 'created_at' => $now, 'updated_at' => $now],
            ['url_url' => 'do-dien-tu', 'url_ten_loai' => 'CM SAN PHAM', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
