<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToChiTietHoaDonBanSanPhamTable extends Migration
{
    public function up()
    {
        Schema::table('chi_tiet_hoa_don_ban_san_pham', function (Blueprint $table) {
            $table->double('phan_tram_chieu_khau')->nullable();
        });
    }

    public function down()
    {
        Schema::table('chi_tiet_hoa_don_ban_san_pham', function (Blueprint $table) {
            //
        });
    }
}
