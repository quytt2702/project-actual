<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmspSpTable extends Migration
{
    public function up()
    {
        Schema::create('cmsp_sp', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_cmsp')->index()->nullable();
            $table->unsignedInteger('id_sp')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cmsp_sp');
    }
}
