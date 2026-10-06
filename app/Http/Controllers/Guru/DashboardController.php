<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\GuruMapelKelas;
use App\Models\Pengumpulan;
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

        $statusChart = [
            'draft' => Tugas::where('guru_id', auth()->id())->where('status', 'draft')->count(),
            'aktif' => $tugasAktif,
            'selesai' => Tugas::where('guru_id', auth()->id())->where('status', 'selesai')->count(),
        ];

        $aktivitas = Pengumpulan::whereHas('tugas', fn ($q) => $q->where('guru_id', auth()->id()))
            ->with(['siswa', 'tugas'])
            ->latest('waktu_upload')
            ->take(6)
            ->get();

        return view('guru.dashboard', compact('tugasAktif', 'tanpaNilai', 'penugasan', 'statusChart', 'aktivitas'));
    }
}
