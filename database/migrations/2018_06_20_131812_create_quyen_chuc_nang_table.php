<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenChucNangTable extends Migration
{
    public function up()
    {
        Schema::create('quyen_chuc_nang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_quyen')->index()->nullable();
            $table->unsignedInteger('id_chuc_nang')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quyen_chuc_nang');
    }
}
