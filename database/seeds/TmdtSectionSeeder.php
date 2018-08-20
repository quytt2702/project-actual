<?php

use Illuminate\Database\Seeder;

class TmdtSectionSeeder extends Seeder
{
    public function run()
    {
        DB::table('tmdt_section')
            ->insert([
                [
                    'ten' => 'Section 01',
                    'number_post' => '6',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'NO',
                ],[
                    'ten' => 'Section 02',
                    'number_post' => '6',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'NO',
                ],[
                    'ten' => 'Section 03',
                    'number_post' => '3',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'NO',
                ],[
                    'ten' => 'Section 04',
                    'number_post' => '3',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'YES',
                ],[
                    'ten' => 'Section 05',
                    'number_post' => '5',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'NO',
                ],[
                    'ten' => 'Section 06',
                    'number_post' => '3',
                    'image' => '/lands/icons/section_1_1.png',
                    'type' => '1',
                    'is_slide' => 'NO',
                    'is_html' => 'NO',
                ],
            ]);
    }
}
