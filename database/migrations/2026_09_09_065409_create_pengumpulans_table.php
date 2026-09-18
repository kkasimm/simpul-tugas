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
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tugas_id')->constrained('tugas')->cascadeOnDelete();
            $table->string('file_tugas')->nullable();
            $table->dateTime('waktu_upload')->nullable();
            $table->enum('status', ['belum', 'tepat_waktu', 'terlambat'])->default('belum');
            $table->unsignedTinyInteger('nilai')->nullable();
            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulans');
    }
};
