<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\NhaCungCap;

class CreateNhaCungCapTable extends Migration
{
    public function up()
    {
        Schema::create('nha_cung_cap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nha_cung_cap_ten')->nullable();
            $table->string('nha_cung_cap_dia_chi')->nullable();
            $table->string('nha_cung_cap_phone_01')->nullable();
            $table->string('nha_cung_cap_phone_02')->nullable();
            $table->string('nha_cung_cap_is_active')->default(NhaCungCap::IS_ACTIVE['NO'])->nullable();
            $table->string('nha_cung_cap_is_delete')->default(NhaCungCap::IS_DELETE['NO'])->nullable();
            $table->string('nha_cung_cap_thong_tin_them')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nha_cung_cap');
    }
}
