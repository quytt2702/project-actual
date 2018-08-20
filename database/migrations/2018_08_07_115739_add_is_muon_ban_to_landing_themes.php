<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Entities\Landing\LandingTheme;

class AddIsMuonBanToLandingThemes extends Migration
{
    public function up()
    {
        Schema::table('landing_themes', function (Blueprint $table) {
            $table->string('is_muon_ban')->default(LandingTheme::IS_MUON_BAN['NO'])->nullable();
        });
    }

    public function down()
    {
        Schema::table('landing_themes', function (Blueprint $table) {
            //
        });
    }
}
