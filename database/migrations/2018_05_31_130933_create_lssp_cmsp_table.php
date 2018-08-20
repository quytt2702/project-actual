<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsspCmspTable extends Migration
{
    public function up()
    {
        Schema::create('lssp_cmsp', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_lssp')->index()->nullable();
            $table->unsignedInteger('id_cmsp')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lssp_cmsp');
    }
}
