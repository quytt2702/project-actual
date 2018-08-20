<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogThuongLandingPageTable extends Migration
{
    public function up()
    {
        Schema::create('log_thuong_landing_page', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_nguoi_duoc_thuong')->index()->nullable();
            $table->string('ten_nguoi_duoc_thuong')->nullable();
            $table->string('id_landing_page')->nullable();
            $table->string('ten_landing_page')->nullable();
            $table->string('san_pham_landing_page')->nullable();
            $table->string('ten_khach_hang_mua')->nullable();
            $table->string('sdt_khach_hang_mua')->nullable();
            $table->string('email_khach_hang_mua')->nullable();
            $table->double('so_tien_duoc_thuong')->nullable();
            $table->double('pham_tram_duoc_thuong')->nullable();
            $table->double('so_tien_hoa_hong_mua')->nullable();
            $table->string('hash')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_thuong_landing_page');
    }
}
