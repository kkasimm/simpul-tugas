<?php

namespace Database\Seeders;

use App\Models\GuruMapelKelas;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $kelas = Kelas::create(['nama_kelas' => 'XII RPL 1']);
        $mapel = Mapel::create(['nama_mapel' => 'Pemodelan Perangkat Lunak']);

        $guru = User::create([
            'name' => 'Bu Rina',
            'email' => 'guru@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'guru',
        ]);

        // relasi guru mengajar mapel di kelas ini — normalnya diatur Admin di menu Kelola Mapel (Tahap 3)
        GuruMapelKelas::create([
            'guru_id' => $guru->id,
            'mapel_id' => $mapel->id,
            'kelas_id' => $kelas->id,
        ]);

        User::create([
            'name' => 'Ani',
            'email' => 'siswa@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'siswa',
            'kelas_id' => $kelas->id,
            'jk' => 'P',
        ]);
    }
}
