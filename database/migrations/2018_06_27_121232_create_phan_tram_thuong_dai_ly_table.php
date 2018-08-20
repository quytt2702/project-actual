<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanTramThuongDaiLyTable extends Migration
{
    public function up()
    {
        Schema::create('phan_tram_thuong_dai_ly', function (Blueprint $table) {
            $table->increments('id');
            $table->double('muc_yeu_cau');
            $table->double('phan_tram_thuong');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phan_tram_thuong_dai_ly');
    }
}
