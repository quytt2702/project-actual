<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeSectionInfoTable extends Migration
{
    public function up()
    {
        Schema::create('landing_section_info', function (Blueprint $table) {
            $table->unsignedInteger('section_id')->index();
            $table->tinyInteger('show_full_name')->default(0);
            $table->tinyInteger('show_email')->default(0);
            $table->tinyInteger('show_phone')->default(0);
            $table->tinyInteger('show_notes')->default(0);
            $table->tinyInteger('show_extra_req')->default(0);
            $table->string('text_full_name')->nullable();
            $table->string('text_email')->nullable();
            $table->string('text_phone')->nullable();
            $table->text('text_notes')->nullable();
            $table->text('text_extra_req')->nullable();
            $table->text('text_link_affiliate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landing_section_info');
    }
}
