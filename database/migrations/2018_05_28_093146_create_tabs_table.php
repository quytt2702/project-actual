<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Tab;

class CreateTabsTable extends Migration
{
    public function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_tab')->nullable();
            $table->string('is_open')->default(Tab::IS_OPEN['YES'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabs');
    }
}
