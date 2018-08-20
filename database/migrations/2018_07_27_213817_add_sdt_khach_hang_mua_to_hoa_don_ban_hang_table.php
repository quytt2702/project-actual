<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSdtKhachHangMuaToHoaDonBanHangTable extends Migration
{
    public function up()
    {
        Schema::table('hoa_don_ban_hang', function (Blueprint $table) {
            $table->string('sdt_khach_hang_mua')->nullable();
        });
    }

    public function down()
    {
        Schema::table('hoa_don_ban_hang', function (Blueprint $table) {
            //
        });
    }
}
