<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Tugas;

class KalenderController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('kelas_id', auth()->user()->kelas_id)
            ->where('status', '!=', 'draft')
            ->with(['mapel', 'pengumpulan' => fn ($q) => $q->where('siswa_id', auth()->id())])
            ->get();

        $events = $tugas->map(function ($t) {
            $status = optional($t->pengumpulan->first())->status ?? 'belum';
            $color = match ($status) {
                'dinilai' => '#28a745',
                'terkirim' => '#2fa6a5',
                default => '#dc3545',
            };

            return [
                'title' => $t->judul . ' (' . ($t->mapel->nama_mapel ?? '-') . ')',
                'start' => $t->tenggat_waktu->toIso8601String(),
                'color' => $color,
                'url' => route('siswa.tugas.show', $t),
            ];
        });

        return view('siswa.kalender.index', compact('events'));
    }
}
