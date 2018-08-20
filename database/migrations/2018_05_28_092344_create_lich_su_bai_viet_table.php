<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\BaiViet;

class CreateLichSuBaiVietTable extends Migration
{

    public function up()
    {
        Schema::create('lich_su_bai_viet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_bai_viet')->index()->nullable();
            $table->string('tieu_de')->nullable();
            $table->string('url')->nullable();
            $table->text('mo_ta_ngan')->nullable();
            $table->text('noi_dung')->nullable();
            $table->text('keyword')->nullable();
            $table->text('id_chuyen_muc')->nullable();
            $table->text('ten_chuyen_muc')->nullable();
            $table->text('tags')->nullable();
            $table->string('hinh_dai_dien')->nullable();
            $table->string('is_accept')->default(BaiViet::IS_ACCEPT['NO'])->nullable();
            $table->string('is_delete')->default(BaiViet::IS_DELETE['NO'])->nullable();
            $table->string('nguoi_tao')->nullable();
            $table->string('nguoi_cap_nhat')->nullable();
            $table->string('nguoi_duyet')->nullable();
            $table->string('thay_doi')->nullable();
            $table->unsignedInteger('id_nguoi_tao')->index()->nullable();
            $table->unsignedInteger('id_nguoi_cap_nhat')->index()->nullable();
            $table->unsignedInteger('id_nguoi_duyet')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lich_su_bai_viet');
    }
}
