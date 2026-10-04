@extends('layouts.app')
@section('title', 'Dashboard Guru')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Guru</h1>

    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Tugas Aktif</div>
                <div class="fs-3 fw-bold">{{ $tugasAktif }}</div>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Tanpa Nilai</div>
                <div class="fs-3 fw-bold">{{ $tanpaNilai }}</div>
            </div></div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
            <thead><tr><th>Kelas</th><th>Mata Pelajaran</th></tr></thead>
            <tbody>
                @forelse ($penugasan as $p)
                    <tr><td>{{ $p->kelas->nama_kelas }}</td><td>{{ $p->mapel->nama_mapel }}</td></tr>
                @empty
                    <tr><td colspan="2" class="text-center text-muted">Belum ada penugasan mengajar. Hubungi Admin.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
