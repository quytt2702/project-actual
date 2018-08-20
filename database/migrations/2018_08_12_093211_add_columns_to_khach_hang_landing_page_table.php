<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToKhachHangLandingPageTable extends Migration
{
    public function up()
    {
        Schema::table('khach_hang_landing_page', function (Blueprint $table) {
            $table->string('ghi_chu')->nullable();
            $table->string('yeu_cau_them')->nullable();
        });
    }

    public function down()
    {
        Schema::table('khach_hang_landing_page', function (Blueprint $table) {
            //
        });
    }
}
