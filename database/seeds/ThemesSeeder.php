<?php

use Illuminate\Console\Command;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    protected $command;

    public function __construct()
    {
        $this->command = app(Command::class);
    }

    public function run()
    {
        $this->availableThemes();
    }

    public function availableThemes()
    {
        $this->command->info('Running Seeder for Available Themes Layout');

        // Seeding `themes` Table
        DB::table('themes')->truncate();
        DB::table('themes')->insert([
            ['id' => 1, 'code' => 'ca', 'title' => 'CA Theme', 'type' => 'landing'],
        ]);

        // Seeding `theme_sections` Table for CA Theme
        DB::table('theme_sections')->truncate();
        DB::table('theme_sections')->insert([
            // ['theme_id' => 1, 'code' => 'section_blank', 'icon' => '/lands/icons/section_blank.png'],
            ['theme_id' => 1, 'code' => 'section_1_1', 'icon' => '/lands/icons/section_1_1.png'],
            ['theme_id' => 1, 'code' => 'section_1_2', 'icon' => '/lands/icons/section_1_2.png'],
            ['theme_id' => 1, 'code' => 'section_1_3', 'icon' => '/lands/icons/section_1_3.png'],
            ['theme_id' => 1, 'code' => 'section_1_4', 'icon' => '/lands/icons/section_1_4.png'],
            ['theme_id' => 1, 'code' => 'section_1_5', 'icon' => '/lands/icons/section_1_5.png'],
            ['theme_id' => 1, 'code' => 'section_1_6', 'icon' => '/lands/icons/section_1_6.png'],
            // ['theme_id' => 1, 'code' => 'section_2', 'icon' => '/lands/icons/section_2.png'],
            ['theme_id' => 1, 'code' => 'section_3', 'icon' => '/lands/icons/section_3.png'],
            ['theme_id' => 1, 'code' => 'section_4', 'icon' => '/lands/icons/section_4.png'],
            ['theme_id' => 1, 'code' => 'section_5', 'icon' => '/lands/icons/section_5.png'],
            ['theme_id' => 1, 'code' => 'section_6', 'icon' => '/lands/icons/section_6.png'],
            // ['theme_id' => 1, 'code' => 'section_7', 'icon' => '/lands/icons/section_7.png'],
            ['theme_id' => 1, 'code' => 'section_8', 'icon' => '/lands/icons/section_8.png'],
            ['theme_id' => 1, 'code' => 'section_9', 'icon' => '/lands/icons/section_9.png'],
            ['theme_id' => 1, 'code' => 'section_10', 'icon' => '/lands/icons/section_10.png'],
            ['theme_id' => 1, 'code' => 'section_11', 'icon' => '/lands/icons/section_11.png'],
        ]);
    }
}
