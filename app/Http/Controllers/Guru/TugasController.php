<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\GuruMapelKelas;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('guru_id', auth()->id())->with('kelas')->latest()->get();

        return view('guru.tugas.index', compact('tugas'));
    }

    public function create()
    {
        $kelasList = $this->kelasDiajar();

        return view('guru.tugas.create', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tenggat_waktu' => ['required', 'date'],
            'kelas_id' => ['required', 'exists:kelas,id'],
        ]);

        abort_unless($this->kelasDiajar()->contains('id', $validated['kelas_id']), 403);

        Tugas::create([
            ...$validated,
            'guru_id' => auth()->id(),
        ]);

        return redirect()->route('guru.tugas.index')->with('status', 'Tugas berhasil dibuat.');
    }

    public function edit(Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $kelasList = $this->kelasDiajar();

        return view('guru.tugas.edit', compact('tugas', 'kelasList'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tenggat_waktu' => ['required', 'date'],
            'kelas_id' => ['required', 'exists:kelas,id'],
        ]);

        abort_unless($this->kelasDiajar()->contains('id', $validated['kelas_id']), 403);

        $tugas->update($validated);

        return redirect()->route('guru.tugas.index')->with('status', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $tugas->delete();

        return back()->with('status', 'Tugas berhasil dihapus.');
    }

    /**
     * Daftar kelas tempat guru yang login ini mengajar (dari tabel guru_mapel_kelas,
     * yang diatur oleh Admin). Guru cuma boleh buat tugas untuk kelas yang dia ajar.
     */
    private function kelasDiajar()
    {
        return GuruMapelKelas::where('guru_id', auth()->id())
            ->with('kelas')
            ->get()
            ->pluck('kelas')
            ->unique('id')
            ->values();
    }
}
