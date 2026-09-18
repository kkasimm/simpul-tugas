<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->enum('status', ['belum', 'terkirim', 'dinilai'])->default('belum')->after('waktu_upload');
        });
    }

    public function down(): void
    {
        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('pengumpulans', function (Blueprint $table) {
            $table->enum('status', ['belum', 'tepat_waktu', 'terlambat'])->default('belum')->after('waktu_upload');
        });
    }
};
