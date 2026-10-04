<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tugas', function (Blueprint $table) {
            $table->foreignId('mapel_id')->nullable()->after('kelas_id')->constrained('mapel')->cascadeOnDelete();
            $table->enum('status', ['draft', 'aktif', 'selesai'])->default('aktif')->after('tenggat_waktu');
        });
    }

    public function down(): void
    {
        Schema::table('tugas', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);
            $table->dropColumn(['mapel_id', 'status']);
        });
    }
};
