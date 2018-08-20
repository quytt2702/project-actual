<?php

use Illuminate\Database\Seeder;

class NhomQuyenSeeder extends Seeder
{
    public function run()
    {
        DB::table('nhom_quyen')->insert([
            ['ten_nhom' => 'Admin',         'mo_ta' => 'Admin'],
            ['ten_nhom' => 'Người dùng',    'mo_ta' => 'Người dùng'],
            ['ten_nhom' => 'Cộng tác viên', 'mo_ta' => 'Cộng tác viên'],
        ]);
    }
}
