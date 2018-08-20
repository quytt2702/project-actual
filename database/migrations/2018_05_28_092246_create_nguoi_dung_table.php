<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\NguoiDung;

class CreateNguoiDungTable extends Migration
{
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->string('ho_va_ten')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->string('txid')->nullable();
            $table->string('sdt')->nullable();
            $table->string('facebook')->nullable();
            $table->string('dia_chi_hien_tai')->nullable();
            $table->string('dia_chi_cmnd')->nullable();
            $table->string('ten_chu_tai_khoan')->nullable();
            $table->string('ten_chi_nhanh')->nullable();
            $table->string('is_kich_hoat')->default(NguoiDung::IS_KICH_HOAT['NOT_YET']);
            $table->string('email_gioi_thieu')->nullable();
            $table->string('is_delete')->default(NguoiDung::IS_DELETE['NO']);
            $table->dateTime('ngay_sinh')->nullable();
            $table->unsignedInteger('id_nhom_quyen')->index()->nullable();
            $table->unsignedInteger('id_ngan_hang')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nguoi_dung');
    }
}
