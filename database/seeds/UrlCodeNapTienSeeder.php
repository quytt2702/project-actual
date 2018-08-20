<?php

use Illuminate\Database\Seeder;

class UrlCodeNapTienSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        DB::table('url')->insert([
            'url_url'       => 'code-nap-tien',
            'url_ten_loai'  => 'THONG TIN WEB',
            'url_noi_dung'  => 'Code nạp tiền',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
