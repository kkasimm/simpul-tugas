<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pengumpulan;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    public function index(Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $pengumpulan = Pengumpulan::where('tugas_id', $tugas->id)->with('siswa')->get();

        $siswaSudahKumpul = $pengumpulan->pluck('siswa_id');

        $siswaBelum = User::where('role', 'siswa')
            ->where('kelas_id', $tugas->kelas_id)
            ->whereNotIn('id', $siswaSudahKumpul)
            ->get();

        return view('guru.pengumpulan.index', compact('tugas', 'pengumpulan', 'siswaBelum'));
    }

    public function update(Request $request, Pengumpulan $pengumpulan)
    {
        abort_unless($pengumpulan->tugas->guru_id === auth()->id(), 403);

        $request->validate([
            'nilai' => ['required', 'integer', 'min:0', 'max:100'],
            'komentar' => ['nullable', 'string'],
        ]);

        $pengumpulan->update([
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'status' => 'dinilai',
        ]);

        return back()->with('status', 'Nilai berhasil disimpan.');
    }
}
