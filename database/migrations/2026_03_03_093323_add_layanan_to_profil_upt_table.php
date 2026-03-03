<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profil_upt', function (Blueprint $table) {
            $table->json('layanan')->nullable()->after('keunggulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profil_upt', function (Blueprint $table) {
            $table->dropColumn('layanan');
        });
    }
};
