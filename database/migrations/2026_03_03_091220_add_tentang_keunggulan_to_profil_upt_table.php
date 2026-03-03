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
            $table->string('tentang_judul')->nullable()->after('misi');
            $table->string('tentang_subjudul')->nullable()->after('tentang_judul');
            $table->text('tentang_deskripsi_1')->nullable()->after('tentang_subjudul');
            $table->text('tentang_deskripsi_2')->nullable()->after('tentang_deskripsi_1');
            $table->json('tentang_fitur')->nullable()->after('tentang_deskripsi_2');   // array of string
            $table->json('keunggulan')->nullable()->after('tentang_fitur');            // array of {icon, title, desc}
            $table->string('foto_tentang')->nullable()->after('keunggulan');
        });
    }

    public function down()
    {
        Schema::table('profil_upt', function (Blueprint $table) {
            $table->dropColumn(['tentang_judul','tentang_subjudul','tentang_deskripsi_1','tentang_deskripsi_2','tentang_fitur','keunggulan','foto_tentang']);
        });
    }
};
