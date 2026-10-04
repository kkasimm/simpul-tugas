@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@php
    $tugasBaru = $stats['tugas_baru'] ?? 0;
    $terkirim = $stats['terkirim'] ?? 0;
    $terlambat = $stats['terlambat'] ?? 0;
@endphp

@section('content')
    <h1>Dashboard Siswa</h1>

    <div class="stat-cards">
        <div class="stat-card"><div class="label">Tugas Baru</div><div class="value">{{ $tugasBaru }}</div></div>
        <div class="stat-card"><div class="label">Terkirim</div><div class="value">{{ $terkirim }}</div></div>
        <div class="stat-card"><div class="label">Terlambat</div><div class="value">{{ $terlambat }}</div></div>
    </div>

    <p style="font-weight:700;margin-bottom:10px">Tugas Terbaru</p>
    <table>
        <tr><th>Nama Tugas</th><th>Tenggat Waktu</th><th>Status</th></tr>
        @forelse ($tugasTerbaru ?? [] as $t)
            @php $p = $t->pengumpulan->first(); @endphp
            <tr>
                <td>{{ $t->judul }}</td>
                <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                <td><span class="badge badge-{{ $p->status ?? 'belum' }}">{{ ucfirst($p->status ?? 'belum') }}</span></td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada tugas.</td></tr>
        @endforelse
    </table>
@endsection
