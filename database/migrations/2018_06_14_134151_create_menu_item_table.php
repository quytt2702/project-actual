<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemTable extends Migration
{
    public function up()
    {
        Schema::create('menu_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theme_id')->index();
            $table->unsignedInteger('section_id')->index();
            $table->string('menu_text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_item');
    }
}
