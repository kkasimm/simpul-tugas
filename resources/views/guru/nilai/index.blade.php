@extends('layouts.app')
@section('title', 'Nilai Tugas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Nilai Tugas</h1>

    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead>
                <tr>
                    <th>Nama Tugas</th><th>Kelas</th><th>Mata Pelajaran</th><th>Tanggal Pengumpulan</th>
                    <th>Terkumpul</th><th>Belum Dinilai</th><th style="width:110px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tugas as $t)
                    <tr>
                        <td>{{ $t->judul }}</td>
                        <td>{{ $t->kelas->nama_kelas }}</td>
                        <td>{{ $t->mapel->nama_mapel ?? '-' }}</td>
                        <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                        <td>{{ $t->terkumpul_count }} / {{ $totalSiswaPerKelas[$t->kelas_id] ?? 0 }}</td>
                        <td>
                            @if ($t->belum_dinilai_count > 0)
                                <span class="badge bg-warning text-dark">{{ $t->belum_dinilai_count }}</span>
                            @else
                                <span class="badge bg-success">0</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('guru.tugas.pengumpulan', $t) }}" class="btn btn-sm btn-primary"><i class="bi bi-star"></i> Nilai</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Belum ada tugas aktif/selesai untuk dinilai.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <p class="text-muted small">Tugas berstatus Draft tidak ditampilkan di sini.</p>
@endsection
