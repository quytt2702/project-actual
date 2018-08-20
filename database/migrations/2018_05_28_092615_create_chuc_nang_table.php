<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChucNangTable extends Migration
{
    public function up()
    {
        Schema::create('chuc_nang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chuc_nang_ma_code')->nullable();
            $table->string('chuc_nang_ten')->nullable();
            $table->string('chuc_nang_id_phu')->nullable();
            $table->string('chuc_nang_ten_nhom')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chuc_nang');
    }
}
