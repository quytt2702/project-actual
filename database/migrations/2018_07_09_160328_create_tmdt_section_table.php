<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmdtSectionTable extends Migration
{
    public function up()
    {
        Schema::create('tmdt_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('number_post');
            $table->string('image');
            $table->string('type');
            $table->string('is_slide');
            $table->string('is_html');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tmdt_section');
    }
}
