<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            ['username'  => 'admin',  'email' => 'admin@admin.com',  'password'  => bcrypt('123123123'), 'ho_va_ten' => 'Trần Văn Admin 1'],
            ['username'  => 'admin1', 'email' => 'admin1@admin.com', 'password'  => bcrypt('1231231231'), 'ho_va_ten' => 'Trần Văn Admin 2'],
            ['username'  => 'admin2', 'email' => 'admin2@admin.com', 'password'  => bcrypt('1231231231'), 'ho_va_ten' => 'Trần Văn Admin 3'],
        ]);
    }
}
