<?php

use Illuminate\Database\Seeder;

class NganHangSeeder extends Seeder
{
    public function run()
    {
        $ngan_hang = ['VCB', 'Techcombank', 'VIB', 'Agribank'];

        foreach ($ngan_hang as $item) {
            DB::table('ngan_hang')->insert([
                'ten_ngan_hang' => $item
            ]);
        }
    }
}
