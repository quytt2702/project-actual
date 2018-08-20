<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\CodeNapDiem;

class CreateCodeNapDiemTable extends Migration
{
    public function up()
    {
        Schema::create('code_nap_diem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nap_tien')->nullable();
            $table->string('seri')->nullable();
            $table->string('hide_hash')->nullable();
            $table->double('so_diem')->nullable();
            $table->string('email_nguoi_tao')->nullable();
            $table->string('dot_tao_ma')->nullable();
            $table->string('trang_thai')->default(CodeNapDiem::TRANG_THAI['NOT_YET'])->nullable();
            $table->string('email_nguoi_nap')->nullable();
            $table->dateTime('ngay_nap')->nullable();
            $table->string('is_active')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('code_nap_diem');
    }
}
