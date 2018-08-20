<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsbvCmTable extends Migration
{
    public function up()
    {
        Schema::create('lsbv_cm', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_chuyen_muc')->index()->nullable();
            $table->unsignedInteger('id_lich_su_bai_viet')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lsbv_cm');
    }
}
