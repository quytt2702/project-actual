<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionQuotesTable extends Migration
{
    public function up()
    {
        Schema::create('section_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('author')->nullable();
            $table->text('author_image_url')->nullable();
            $table->text('subtitle')->nullable();
            $table->float('stars')->default(0);
            $table->text('content')->nullable();
            $table->unsignedInteger('section_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_quotes');
    }
}
