<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = ['nama_mapel'];

    public function penugasan()
    {
        return $this->hasMany(GuruMapelKelas::class);
    }
}
