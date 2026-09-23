<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nama_kelas' => ['required', 'string', 'max:255']]);
        Kelas::create($validated);
        return redirect()->route('admin.kelas.index')->with('status', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate(['nama_kelas' => ['required', 'string', 'max:255']]);
        $kelas->update($validated);
        return redirect()->route('admin.kelas.index')->with('status', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return back()->with('status', 'Kelas berhasil dihapus.');
    }
}
