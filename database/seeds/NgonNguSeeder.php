<?php

use Illuminate\Database\Seeder;

use App\Entities\NgonNgu;

class NgonNguSeeder extends Seeder
{
    public function run()
    {
        $ngon_ngu = [
            ['ma' => 'vi', 'ten' => 'Việt Nam'  , 'is_open' => NgonNgu::IS_OPEN['YES'], 'url' => '/images/flags/vn.png'],
            ['ma' => 'en', 'ten' => 'Tiếng Anh' , 'is_open' => NgonNgu::IS_OPEN['YES'], 'url' => '/images/flags/uk.png'],
            ['ma' => 'kr', 'ten' => 'Hàn Quốc'  , 'is_open' => NgonNgu::IS_OPEN['NO'], 'url' => '/images/flags/kr.png'],
            ['ma' => 'ja', 'ten' => 'Nhật Bản'  , 'is_open' => NgonNgu::IS_OPEN['NO'], 'url' => '/images/flags/ja.png'],
            ['ma' => 'cn', 'ten' => 'Trung Quốc', 'is_open' => NgonNgu::IS_OPEN['NO'], 'url' => '/images/flags/cn.png']
        ];

        foreach ($ngon_ngu as $item) {
            DB::table('ngon_ngu')->insert($item);
        }
    }
}
