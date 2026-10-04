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
        $tugas = Tugas::where('guru_id', auth()->id())->with(['kelas', 'mapel'])->latest()->get();

        return view('guru.tugas.index', compact('tugas'));
    }

    public function create()
    {
        $penugasanList = $this->penugasanDiajar();

        return view('guru.tugas.create', compact('penugasanList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tenggat_waktu' => ['required', 'date'],
            'penugasan_id' => ['required', 'exists:guru_mapel_kelas,id'],
            'status' => ['required', 'in:draft,aktif,selesai'],
        ]);

        $penugasan = $this->penugasanDiajar()->firstWhere('id', (int) $validated['penugasan_id']);
        abort_unless($penugasan, 403);

        Tugas::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'tenggat_waktu' => $validated['tenggat_waktu'],
            'status' => $validated['status'],
            'guru_id' => auth()->id(),
            'kelas_id' => $penugasan->kelas_id,
            'mapel_id' => $penugasan->mapel_id,
        ]);

        return redirect()->route('guru.tugas.index')->with('status', 'Tugas berhasil dibuat.');
    }

    public function edit(Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $penugasanList = $this->penugasanDiajar();
        $penugasanSaatIni = $penugasanList->first(fn ($p) => $p->kelas_id === $tugas->kelas_id && $p->mapel_id === $tugas->mapel_id);

        return view('guru.tugas.edit', compact('tugas', 'penugasanList', 'penugasanSaatIni'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tenggat_waktu' => ['required', 'date'],
            'penugasan_id' => ['required', 'exists:guru_mapel_kelas,id'],
            'status' => ['required', 'in:draft,aktif,selesai'],
        ]);

        $penugasan = $this->penugasanDiajar()->firstWhere('id', (int) $validated['penugasan_id']);
        abort_unless($penugasan, 403);

        $tugas->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'tenggat_waktu' => $validated['tenggat_waktu'],
            'status' => $validated['status'],
            'kelas_id' => $penugasan->kelas_id,
            'mapel_id' => $penugasan->mapel_id,
        ]);

        return redirect()->route('guru.tugas.index')->with('status', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Tugas $tugas)
    {
        abort_unless($tugas->guru_id === auth()->id(), 403);

        $tugas->delete();

        return back()->with('status', 'Tugas berhasil dihapus.');
    }

    private function penugasanDiajar()
    {
        return GuruMapelKelas::where('guru_id', auth()->id())
            ->with(['kelas', 'mapel'])
            ->get();
    }
}
