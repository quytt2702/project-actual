<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icon_contents', function (Blueprint $table) {
            $table->integer('position')->default(0);
        });

        Schema::table('section_quotes', function (Blueprint $table) {
            $table->integer('position')->default(0);
        });

        Schema::table('action_images', function (Blueprint $table) {
            $table->integer('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
