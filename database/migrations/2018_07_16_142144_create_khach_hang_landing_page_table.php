<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangLandingPageTable extends Migration
{
    public function up()
    {
        Schema::create('khach_hang_landing_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('ho_ten')->nullable();
            $table->string('sdt')->nullable();
            $table->string('link_landing_page')->nullable();
            $table->string('email_ctv')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khach_hang_landing_page');
    }
}
