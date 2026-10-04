@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <h1 class="h4 fw-bold mb-3">Dashboard Admin</h1>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Jumlah Siswa</div>
                <div class="fs-3 fw-bold">{{ $jumlahSiswa }}</div>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Jumlah Guru</div>
                <div class="fs-3 fw-bold">{{ $jumlahGuru }}</div>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <div class="text-muted small">Jumlah Mata Pelajaran</div>
                <div class="fs-3 fw-bold">{{ $jumlahMapel }}</div>
            </div></div>
        </div>
    </div>
@endsection
