<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->unique(['siswa_id', 'tugas_id']);
        });

        Schema::table('guru_mapel_kelas', function (Blueprint $table) {
            $table->unique(['guru_id', 'mapel_id', 'kelas_id']);
        });
    }

    public function down(): void
    {
        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->dropUnique(['siswa_id', 'tugas_id']);
        });

        Schema::table('guru_mapel_kelas', function (Blueprint $table) {
            $table->dropUnique(['guru_id', 'mapel_id', 'kelas_id']);
        });
    }
};
