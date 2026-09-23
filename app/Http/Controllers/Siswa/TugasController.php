<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pengumpulan;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $kelasId = auth()->user()->kelas_id;

        $tugas = Tugas::where('kelas_id', $kelasId)
            ->with(['pengumpulan' => fn ($q) => $q->where('siswa_id', auth()->id())])
            ->latest()
            ->get();

        return view('siswa.tugas.index', compact('tugas'));
    }

    public function show(Tugas $tugas)
    {
        abort_unless($tugas->kelas_id === auth()->user()->kelas_id, 403);

        $pengumpulan = Pengumpulan::where('tugas_id', $tugas->id)
            ->where('siswa_id', auth()->id())
            ->first();

        return view('siswa.tugas.show', compact('tugas', 'pengumpulan'));
    }

    public function store(Request $request, Tugas $tugas)
    {
        abort_unless($tugas->kelas_id === auth()->user()->kelas_id, 403);

        $request->validate([
            'file_tugas' => ['required', 'file', 'mimes:pdf,doc,docx,zip,jpg,jpeg,png', 'max:5120'],
        ]);

        $path = $request->file('file_tugas')->store('pengumpulan', 'public');

        Pengumpulan::updateOrCreate(
            ['tugas_id' => $tugas->id, 'siswa_id' => auth()->id()],
            [
                'file_tugas' => $path,
                'waktu_upload' => now(),
                'status' => 'terkirim',
            ]
        );

        return redirect()->route('siswa.tugas.show', $tugas)->with('status', 'Tugas berhasil diunggah.');
    }
}
