@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Dashboard Admin</h1>

    <div class="stat-cards">
        <div class="stat-card"><div class="label">Jumlah Siswa</div><div class="value">{{ $jumlahSiswa }}</div></div>
        <div class="stat-card"><div class="label">Jumlah Guru</div><div class="value">{{ $jumlahGuru }}</div></div>
        <div class="stat-card"><div class="label">Jumlah Mata Pelajaran</div><div class="value">{{ $jumlahMapel }}</div></div>
    </div>
@endsection
