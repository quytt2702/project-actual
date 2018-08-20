<?php

use Illuminate\Database\Seeder;

class CaiDatNgonNguSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        // INSERT INTO `cai_dat_ngon_ngu` VALUES (1, NULL, 'Việt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, '[{\"ten_hien_thi\":\"Gi\\u1edbi thi\\u1ec7u Lavion\",\"url_co_san\":\"gioi-thieu-lavion\"},{\"ten_hien_thi\":\"\\u0110i\\u1ec1u kho\\u1ea3n s\\u1eed d\\u1ee5ng\",\"url_co_san\":\"dieu-khoan-su-dung\"},{\"ten_hien_thi\":\"M\\u00f4 h\\u00ecnh kinh doanh\",\"url_co_san\":\"mo-hinh-kinh-doanh\"}]', '\"[{\\\"text\\\":\\\"Menu 01\\\",\\\"icon\\\":\\\"\\\",\\\"href\\\":\\\"#\\\"},{\\\"text\\\":\\\"Menu 02\\\",\\\"icon\\\":\\\"empty\\\",\\\"href\\\":\\\"#\\\",\\\"children\\\":[{\\\"text\\\":\\\"Menu 02_01\\\",\\\"icon\\\":\\\"empty\\\",\\\"href\\\":\\\"#\\\"},{\\\"text\\\":\\\"Menu 02_02\\\",\\\"icon\\\":\\\"empty\\\",\\\"href\\\":\\\"#\\\"}]},{\\\"text\\\":\\\"Menu 03\\\",\\\"icon\\\":\\\"empty\\\",\\\"href\\\":\\\"#\\\"},{\\\"text\\\":\\\"Menu 04\\\",\\\"icon\\\":\\\"empty\\\",\\\"href\\\":\\\"#\\\"}]\"', 'MSM SYSTEM', '#', '0123456789', '93 Nguyễn Lương Bằng', 'Tiêu đề 01', '[{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 01\",\"url\":\"#\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 02\",\"url\":\"##\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 03\",\"url\":\"###\"}]', NULL, '[{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 01\",\"url\":\"#\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 02\",\"url\":\"##\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 03\",\"url\":\"###\"}]', 'Tiêu đề 03', '[{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 01\",\"url\":\"#\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 02\",\"url\":\"##\"},{\"ten_hien_thi\":\"Ti\\u00ean hi\\u1ec3n th\\u1ecb 03\",\"url\":\"###\"}]', 1, '2018-07-16 21:25:32', '2018-07-17 17:04:33');
        // INSERT INTO `cai_dat_ngon_ngu` VALUES (2, NULL, 'Tiếng Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-16 21:25:32', '2018-07-16 21:25:32');
        // INSERT INTO `cai_dat_ngon_ngu` VALUES (3, NULL, 'Hàn Quốc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2018-07-16 21:25:32', '2018-07-16 21:25:32');
        // INSERT INTO `cai_dat_ngon_ngu` VALUES (4, NULL, 'Nhật Bản', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2018-07-16 21:25:32', '2018-07-16 21:25:32');
        // INSERT INTO `cai_dat_ngon_ngu` VALUES (5, NULL, 'Trung Quốc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2018-07-16 21:25:32', '2018-07-16 21:25:32');


        $cai_dat_ngon_ngu = [
            [
                'id_ngon_ngu'               => 1,
                'chat_js'                   => 'Việt Nam',
                'link_trang_chu'            => 'gioi-thieu-lavion',
                'facebook'                  => 'Facebook',
                'instagram'                 => 'Instagram',
                'ti_gia_milk'               => 10,
                'tieu_de_trang_web'         => 'Lavion',
                'ten_menu_doc'              => 'Menu dọc',
                'menu_doc'                  => '[{"ten_hien_thi":"Giới thiệu sơ lược về Lavion","url_co_san":"gioi-thieu-lavion","id_ngon_ngu":"1"},{"ten_hien_thi":"Những điều khoản cần biết","url_co_san":"dieu-khoan-su-dung","id_ngon_ngu":"1"}]',
                'menu_ngang'                => '"[{\"text\":\"Menu 01\",\"icon\":\"empty\",\"href\":\"#\",\"children\":[{\"text\":\"Menu 01_01\",\"icon\":\"empty\",\"href\":\"#\"},{\"text\":\"Menu 01_02\",\"icon\":\"empty\",\"href\":\"#\"}]},{\"text\":\"Menu 02\",\"icon\":\"empty\",\"href\":\"#\",\"children\":[{\"text\":\"Menu 02_01\",\"icon\":\"empty\",\"href\":\"#\"}]},{\"text\":\"Menu 03\",\"icon\":\"empty\",\"href\":\"#\"},{\"text\":\"Menu 04\",\"icon\":\"empty\",\"href\":\"#\"}]"',
                'tieu_de_menu_01_footer'    => 'Tiêu đề Menu 01',
                'noi_dung_menu_01_body'     => '[{"ten_hien_thi":"Menu 01","url":"213","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 02","url":"2132","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 03","url":"21322","id_ngon_ngu":"1"}]',
                'noi_dung_menu_02_body'     => '[{"ten_hien_thi":"Menu 01","url":"e2e1","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 02","url":"e2e12","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 03","url":"e2e122","id_ngon_ngu":"1"}]',
                'tieu_de_menu_03_footer'    => 'Tiêu đề Menu 03',
                'noi_dung_menu_03_body'     => '[{"ten_hien_thi":"Menu 01","url":"123","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 02","url":"1232","id_ngon_ngu":"1"},{"ten_hien_thi":"Menu 03","url":"12323","id_ngon_ngu":"1"}]',
                'tieu_de_footer'            => 'Footer',
                'sdt_footer'                => '0123456789',
                'dia_chi_footer'            => '192 Khu Vườn Trên Mây',
                'created_at'                => $now,
                'updated_at'                => $now,
            ],
            ['id_ngon_ngu' => 2, 'chat_js' => 'Tiếng Anh', 'ti_gia_milk' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['id_ngon_ngu' => 3, 'chat_js' => 'Hàn Quốc', 'ti_gia_milk' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['id_ngon_ngu' => 4, 'chat_js' => 'Nhật Bản', 'ti_gia_milk' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['id_ngon_ngu' => 5, 'chat_js' => 'Trung Quốc', 'ti_gia_milk' => 10, 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($cai_dat_ngon_ngu as $item) {
            DB::table('cai_dat_ngon_ngu')->insert($item);
        }
    }
}
