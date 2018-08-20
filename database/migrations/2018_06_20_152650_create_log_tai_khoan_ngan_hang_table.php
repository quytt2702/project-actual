<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\LogTaiKhoanNganHang;

class CreateLogTaiKhoanNganHangTable extends Migration
{
    public function up()
    {
        Schema::create('log_tai_khoan_ngan_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->string('ten_chi_nhanh')->nullable();
            $table->string('ten_chu_tai_khoan')->nullable();
            $table->string('thay_doi')->nullable();
            $table->string('hash')->nullable();
            $table->string('trang_thai')->default(LogTaiKhoanNganHang::TRANG_THAI['NOT_YET']);
            $table->string('quyen')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_tai_khoan_ngan_hang');
    }
}
