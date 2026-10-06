<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;

class KalenderController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('guru_id', auth()->id())->where('status', '!=', 'draft')->with('kelas')->get();

        $events = $tugas->map(function ($t) {
            return [
                'title' => $t->judul . ' (' . $t->kelas->nama_kelas . ')',
                'start' => $t->tenggat_waktu->toIso8601String(),
                'color' => $t->status === 'selesai' ? '#28a745' : '#2fa6a5',
                'url' => route('guru.tugas.pengumpulan', $t),
            ];
        });

        return view('guru.kalender.index', compact('events'));
    }
}
