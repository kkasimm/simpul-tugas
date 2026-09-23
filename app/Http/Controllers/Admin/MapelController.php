<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::latest()->get();
        return view('admin.mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nama_mapel' => ['required', 'string', 'max:255']]);
        Mapel::create($validated);
        return redirect()->route('admin.mapel.index')->with('status', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $validated = $request->validate(['nama_mapel' => ['required', 'string', 'max:255']]);
        $mapel->update($validated);
        return redirect()->route('admin.mapel.index')->with('status', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return back()->with('status', 'Mapel berhasil dihapus.');
    }
}
