@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <h1>Dashboard Guru</h1>

    <div class="stat-cards">
        <div class="stat-card"><div class="label">Tugas Aktif</div><div class="value">{{ $tugasAktif }}</div></div>
        <div class="stat-card"><div class="label">Tanpa Nilai</div><div class="value">{{ $tanpaNilai }}</div></div>
    </div>

    <table>
        <tr><th>Kelas</th><th>Mata Pelajaran</th></tr>
        @forelse ($penugasan as $p)
            <tr>
                <td>{{ $p->kelas->nama_kelas }}</td>
                <td>{{ $p->mapel->nama_mapel }}</td>
            </tr>
        @empty
            <tr><td colspan="2">Belum ada penugasan mengajar. Hubungi Admin.</td></tr>
        @endforelse
    </table>
@endsection
