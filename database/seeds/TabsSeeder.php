<?php

use Illuminate\Database\Seeder;

class TabsSeeder extends Seeder
{
    public function run()
    {
        DB::table('tabs')->insert([
            ['ten_tab' => 'Tab 1'],
            ['ten_tab' => 'Tab 2'],
            ['ten_tab' => 'Tab 3'],
            ['ten_tab' => 'Tab 4'],
            ['ten_tab' => 'Tab 5'],
        ]);
    }
}
