<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $kelasId = auth()->user()->kelas_id;

        $tugas = Tugas::where('kelas_id', $kelasId)
            ->where('status', '!=', 'draft')
            ->with(['mapel', 'pengumpulan' => fn ($q) => $q->where('siswa_id', auth()->id())])
            ->latest()
            ->get();

        $tugasBaru = $tugas->filter(fn ($t) => !$t->pengumpulan->first())->count();
        $terkirim = $tugas->filter(fn ($t) => in_array(optional($t->pengumpulan->first())->status, ['terkirim', 'dinilai']))->count();
        $terlambat = $tugas->filter(fn ($t) => optional($t->pengumpulan->first())->terlambat)->count();

        $stats = ['tugas_baru' => $tugasBaru, 'terkirim' => $terkirim, 'terlambat' => $terlambat];
        $tugasTerbaru = $tugas->take(5);

        $statusChart = [
            'belum' => $tugasBaru,
            'terkirim' => $tugas->filter(fn ($t) => optional($t->pengumpulan->first())->status === 'terkirim')->count(),
            'dinilai' => $tugas->filter(fn ($t) => optional($t->pengumpulan->first())->status === 'dinilai')->count(),
        ];

        return view('siswa.dashboard', compact('stats', 'tugasTerbaru', 'statusChart'));
    }
}
