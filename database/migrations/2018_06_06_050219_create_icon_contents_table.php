<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconContentsTable extends Migration
{
    public function up()
    {
        Schema::create('icon_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->unsignedInteger('section_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('icon_contents');
    }
}
