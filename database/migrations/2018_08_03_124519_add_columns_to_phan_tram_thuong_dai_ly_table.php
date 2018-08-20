<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPhanTramThuongDaiLyTable extends Migration
{
    public function up()
    {
        Schema::table('phan_tram_thuong_dai_ly', function (Blueprint $table) {
            $table->dropColumn('muc_yeu_cau');
            $table->double('muc_yeu_cau_duoi');
            $table->double('muc_yeu_cau_tren');
        });
    }

    public function down()
    {
        Schema::table('phan_tram_thuong_dai_ly', function (Blueprint $table) {
            //
        });
    }
}
