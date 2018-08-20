<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingTablesTable extends Migration
{
    public function up()
    {
        Schema::create('pricing_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('action_text')->nullable();
            $table->text('action_url')->nullable();
            $table->unsignedInteger('section_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricing_tables');
    }
}
