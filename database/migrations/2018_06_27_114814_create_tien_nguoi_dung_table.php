<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTienNguoiDungTable extends Migration
{
    public function up()
    {
        Schema::create('tien_nguoi_dung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->double('tong_tien_vnd')->default(0)->nullable();
            $table->double('nap_api')->default(0)->nullable();
            $table->double('the_milk')->default(0)->nullable();
            $table->double('thuong_gioi_thieu_ctv')->default(0)->nullable();
            $table->double('thuong_dai_ly')->default(0)->nullable();
            $table->double('thuong_hoa_hong_muc_1')->default(0)->nullable();
            $table->double('thuong_hoa_hong_muc_2')->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tien_nguoi_dung');
    }
}
