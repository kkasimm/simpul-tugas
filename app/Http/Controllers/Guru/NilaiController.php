<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\User;

class NilaiController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('guru_id', auth()->id())
            ->where('status', '!=', 'draft')
            ->with(['kelas', 'mapel'])
            ->withCount([
                'pengumpulan as terkumpul_count',
                'pengumpulan as belum_dinilai_count' => fn ($q) => $q->where('status', '!=', 'dinilai'),
            ])
            ->latest()
            ->get();

        $totalSiswaPerKelas = User::where('role', 'siswa')
            ->whereIn('kelas_id', $tugas->pluck('kelas_id')->unique())
            ->selectRaw('kelas_id, count(*) as total')
            ->groupBy('kelas_id')
            ->pluck('total', 'kelas_id');

        return view('guru.nilai.index', compact('tugas', 'totalSiswaPerKelas'));
    }
}
