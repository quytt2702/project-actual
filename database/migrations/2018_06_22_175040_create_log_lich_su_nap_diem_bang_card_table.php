<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogLichSuNapDiemBangCardTable extends Migration
{
    public function up()
    {
        Schema::create('log_lich_su_nap_diem_bang_card', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nap')->nullable();
            $table->string('seri')->nullable();
            $table->string('hide_hash')->nullable();
            $table->double('so_diem')->nullable();
            $table->unsignedInteger('id_nap_diem')->nullable();
            $table->string('email_nap_diem')->nullable();
            $table->string('ngay_nap')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('so_lan_that_bai_lien_tuc')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_lich_su_nap_diem_bang_card');
    }
}
