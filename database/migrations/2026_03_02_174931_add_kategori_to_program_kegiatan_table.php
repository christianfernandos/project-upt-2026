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
        Schema::table('program_kegiatan', function (Blueprint $table) {
            $table->string('kategori')->default('pelatihan-kerja')->after('nama_kegiatan');
            $table->string('durasi')->nullable()->after('kategori');
            $table->string('peserta_target')->nullable()->after('durasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_kegiatan', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'durasi', 'peserta_target']);
        });
    }
};
