@extends('layouts.app')
@section('title', 'Profil Siswa')
@section('content')
    <h1 class="h4 fw-bold mb-3">Profil Siswa</h1>

    <div class="card shadow-sm mb-3" style="max-width:480px">
        <div class="card-body">
            <p class="fw-semibold">Informasi Siswa</p>
            <div class="mb-2"><label class="form-label small text-muted mb-0">Nama</label><div class="form-control-plaintext border rounded px-2 py-1 bg-light">{{ $user->name }}</div></div>
            <div class="mb-2"><label class="form-label small text-muted mb-0">Kelas</label><div class="form-control-plaintext border rounded px-2 py-1 bg-light">{{ $user->kelas->nama_kelas ?? '-' }}</div></div>
            <div class="mb-2"><label class="form-label small text-muted mb-0">Jenis Kelamin</label><div class="form-control-plaintext border rounded px-2 py-1 bg-light">{{ $user->jk === 'L' ? 'Laki-laki' : ($user->jk === 'P' ? 'Perempuan' : '-') }}</div></div>
            <div class="mb-2"><label class="form-label small text-muted mb-0">Email</label><div class="form-control-plaintext border rounded px-2 py-1 bg-light">{{ $user->email }}</div></div>
            <p class="small text-muted mb-0 mt-2">Data profil hanya dapat dilihat. Hubungi Admin untuk perubahan data.</p>
        </div>
    </div>

    <div class="card shadow-sm" style="max-width:480px">
        <div class="card-body">
            <p class="fw-semibold">Ganti Password</p>
            <form method="POST" action="{{ route('password.change') }}">
                @csrf @method('PUT')
                <div class="mb-2"><label class="form-label">Password Lama</label><input type="password" name="current_password" class="form-control"></div>
                <div class="mb-2"><label class="form-label">Password Baru</label><input type="password" name="password" class="form-control"></div>
                <div class="mb-2"><label class="form-label">Konfirmasi Password Baru</label><input type="password" name="password_confirmation" class="form-control"></div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
