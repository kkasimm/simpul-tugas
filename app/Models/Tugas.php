<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'tenggat_waktu', 'guru_id', 'kelas_id'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class);
    }
}
