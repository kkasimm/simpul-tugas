<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruMapelKelas;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public function index()
    {
        $penugasan = GuruMapelKelas::with(['guru', 'mapel', 'kelas'])->latest()->get();
        return view('admin.penugasan.index', compact('penugasan'));
    }

    public function create()
    {
        $guruList = User::where('role', 'guru')->get();
        $mapelList = Mapel::all();
        $kelasList = Kelas::all();
        return view('admin.penugasan.create', compact('guruList', 'mapelList', 'kelasList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id' => ['required', 'exists:users,id'],
            'mapel_id' => ['required', 'exists:mapel,id'],
            'kelas_id' => ['required', 'exists:kelas,id'],
        ]);

        GuruMapelKelas::firstOrCreate($validated);

        return redirect()->route('admin.penugasan.index')->with('status', 'Penugasan berhasil ditambahkan.');
    }

    public function destroy(GuruMapelKelas $penugasan)
    {
        $penugasan->delete();
        return back()->with('status', 'Penugasan berhasil dihapus.');
    }
}
