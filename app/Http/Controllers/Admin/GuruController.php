<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = User::where('role', 'guru')->latest()->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'guru',
        ]);

        return redirect()->route('admin.guru.index')->with('status', 'Guru berhasil ditambahkan.');
    }

    public function edit(User $guru)
    {
        abort_unless($guru->role === 'guru', 404);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, User $guru)
    {
        abort_unless($guru->role === 'guru', 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $guru->id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $guru->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            ...(!empty($validated['password']) ? ['password' => Hash::make($validated['password'])] : []),
        ]);

        return redirect()->route('admin.guru.index')->with('status', 'Guru berhasil diperbarui.');
    }

    public function destroy(User $guru)
    {
        abort_unless($guru->role === 'guru', 404);
        $guru->delete();
        return back()->with('status', 'Guru berhasil dihapus.');
    }
}
