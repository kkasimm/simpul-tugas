<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\GuruMapelKelas;
use App\Models\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $tugasAktif = Tugas::where('guru_id', auth()->id())->where('status', 'aktif')->count();

        $tanpaNilai = Tugas::where('guru_id', auth()->id())
            ->withCount(['pengumpulan as belum_dinilai_count' => fn ($q) => $q->where('status', '!=', 'dinilai')])
            ->get()
            ->sum('belum_dinilai_count');

        $penugasan = GuruMapelKelas::where('guru_id', auth()->id())->with(['kelas', 'mapel'])->get();

        return view('guru.dashboard', [
            'tugasAktif' => $tugasAktif,
            'tanpaNilai' => $tanpaNilai,
            'penugasan' => $penugasan,
        ]);
    }
}
