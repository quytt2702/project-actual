<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVndPendingToTienNguoiDungTable extends Migration
{
    public function up()
    {
        Schema::table('tien_nguoi_dung', function (Blueprint $table) {
            $table->double('vnd_pending')->default(0)->nullable();
        });
    }

    public function down()
    {
        Schema::table('tien_nguoi_dung', function (Blueprint $table) {
            //
        });
    }
}
