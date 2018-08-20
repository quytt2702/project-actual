<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingRowsTable extends Migration
{
    public function up()
    {
        Schema::create('pricing_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pricing_table_id')->index();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricing_rows');
    }
}
