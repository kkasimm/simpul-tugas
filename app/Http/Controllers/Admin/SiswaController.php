<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')->with('kelas')->latest()->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelasList = Kelas::all();
        return view('admin.siswa.create', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'kelas_id' => ['required', 'exists:kelas,id'],
            'jk' => ['required', 'in:L,P'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'siswa',
            'kelas_id' => $validated['kelas_id'],
            'jk' => $validated['jk'],
        ]);

        return redirect()->route('admin.siswa.index')->with('status', 'Siswa berhasil ditambahkan.');
    }

    public function edit(User $siswa)
    {
        abort_unless($siswa->role === 'siswa', 404);
        $kelasList = Kelas::all();
        return view('admin.siswa.edit', ['siswa' => $siswa, 'kelasList' => $kelasList]);
    }

    public function update(Request $request, User $siswa)
    {
        abort_unless($siswa->role === 'siswa', 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $siswa->id],
            'kelas_id' => ['required', 'exists:kelas,id'],
            'jk' => ['required', 'in:L,P'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $siswa->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'kelas_id' => $validated['kelas_id'],
            'jk' => $validated['jk'],
            ...(!empty($validated['password']) ? ['password' => Hash::make($validated['password'])] : []),
        ]);

        return redirect()->route('admin.siswa.index')->with('status', 'Siswa berhasil diperbarui.');
    }

    public function destroy(User $siswa)
    {
        abort_unless($siswa->role === 'siswa', 404);
        $siswa->delete();
        return back()->with('status', 'Siswa berhasil dihapus.');
    }
}
