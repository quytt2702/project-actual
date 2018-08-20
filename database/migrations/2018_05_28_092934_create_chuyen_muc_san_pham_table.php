<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\ChuyenMucSanPham;

class CreateChuyenMucSanPhamTable extends Migration
{

    public function up()
    {
        Schema::create('chuyen_muc_san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chuyen_muc_san_pham_ten')->nullable();
            $table->string('chuyen_muc_san_pham_url')->nullable();
            $table->string('chuyen_muc_san_pham_is_active')->default(ChuyenMucSanPham::IS_ACTIVE['YES'])->nullable();
            $table->unsignedInteger('chuyen_muc_san_pham_id_ngon_ngu')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chuyen_muc_san_pham');
    }
}
