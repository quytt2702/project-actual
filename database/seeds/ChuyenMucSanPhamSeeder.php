<?php

use Illuminate\Database\Seeder;

class ChuyenMucSanPhamSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        DB::table('chuyen_muc_san_pham')->insert([
            ['chuyen_muc_san_pham_ten' => 'Đồ điện tử', 'chuyen_muc_san_pham_url' => 'do-dien-tu', 'chuyen_muc_san_pham_id_ngon_ngu' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['chuyen_muc_san_pham_ten' => 'Đồ gia dụng', 'chuyen_muc_san_pham_url' => 'do-gia-dung', 'chuyen_muc_san_pham_id_ngon_ngu' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['chuyen_muc_san_pham_ten' => 'Đồ nghề', 'chuyen_muc_san_pham_url' => 'do-nghe', 'chuyen_muc_san_pham_id_ngon_ngu' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
