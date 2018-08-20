<?php

use Illuminate\Database\Seeder;

class NhaCungCapSeeder extends Seeder
{
    public function run()
    {
        DB::table('nha_cung_cap')->insert([
            ['nha_cung_cap_ten' => 'Chợ Cồn'],
            ['nha_cung_cap_ten' => 'Chợ Hàn'],
            ['nha_cung_cap_ten' => 'Chợ Đầu Mối'],
        ]);
    }
}
