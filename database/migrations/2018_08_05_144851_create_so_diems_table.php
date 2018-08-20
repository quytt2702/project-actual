<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\SoDiem;

class CreateSoDiemsTable extends Migration
{
    public function up()
    {
        Schema::create('so_diem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_diem')->nullable();
            $table->string('noi_dung')->nullable();
            $table->string('kich_hoat')->default(SoDiem::KICH_HOAT['NO'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('so_diem');
    }
}
