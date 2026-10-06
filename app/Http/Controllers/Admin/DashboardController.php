<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = User::where('role', 'siswa')->count();
        $jumlahGuru = User::where('role', 'guru')->count();
        $jumlahMapel = Mapel::count();

        $siswaPerKelas = Kelas::withCount('siswa')->get();

        $aktivitas = User::whereIn('role', ['siswa', 'guru'])
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'jumlahMapel', 'siswaPerKelas', 'aktivitas'));
    }
}
