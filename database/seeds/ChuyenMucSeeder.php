<?php

use Illuminate\Database\Seeder;

class ChuyenMucSeeder extends Seeder
{
    public function run()
    {
        DB::table('chuyen_muc')->insert([
            ['ten_chuyen_muc' => 'Macbook', 'url' => 'chuyen-muc-bai-viet-1', 'id_ngon_ngu' => '1', 'is_active' => 'YES'],
            ['ten_chuyen_muc' => 'Dell'   , 'url' => 'chuyen-muc-bai-viet-2', 'id_ngon_ngu' => '4', 'is_active' => 'NO'],
            ['ten_chuyen_muc' => 'Asus'   , 'url' => 'chuyen-muc-bai-viet-3', 'id_ngon_ngu' => '2', 'is_active' => 'YES']
        ]);
    }
}
