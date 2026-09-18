<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulans';

    protected $fillable = ['siswa_id', 'tugas_id', 'file_tugas', 'waktu_upload', 'status', 'nilai', 'komentar'];

    protected $casts = [
        'waktu_upload' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function getTerlambatAttribute(): bool
    {
        if (!$this->waktu_upload || !$this->tugas) {
            return false;
        }

        return $this->waktu_upload->gt($this->tugas->tenggat_waktu);
    }
}
