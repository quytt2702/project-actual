<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToNhaCungCap extends Migration
{
    public function up()
    {
        Schema::table('nha_cung_cap', function (Blueprint $table) {
            $table->string('hinh_anh')->nullable();
        });
    }

    public function down()
    {
        Schema::table('nha_cung_cap', function (Blueprint $table) {
            $table->dropColumn('hinh_anh');
        });
    }
}
