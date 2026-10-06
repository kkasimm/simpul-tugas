@extends('layouts.app')
@section('title', 'Profil Guru')
@section('content')
    <h1 class="h4 fw-bold mb-3">Profil Guru</h1>

    <div class="row g-3">
        <div class="col-lg-7">
            <div class="card p-4 h-100">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="avatar-circle">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div>
                        <div class="fw-bold fs-5">{{ $user->name }}</div>
                        <span class="badge bg-primary">Guru</span>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label small text-muted mb-0">Mata Pelajaran &amp; Kelas Diajar</label>
                        <div class="form-control-plaintext border rounded-3 px-3 py-2 bg-light">
                            @forelse ($user->penugasanMengajar as $p)
                                <span class="badge bg-light text-dark border me-1 mb-1">{{ $p->mapel->nama_mapel }} &ndash; {{ $p->kelas->nama_kelas }}</span>
                            @empty
                                Belum ada penugasan
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-muted mb-0">Jenis Kelamin</label>
                        <div class="form-control-plaintext border rounded-3 px-3 py-2 bg-light">{{ $user->jk === 'L' ? 'Laki-laki' : ($user->jk === 'P' ? 'Perempuan' : '-') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-muted mb-0">Email</label>
                        <div class="form-control-plaintext border rounded-3 px-3 py-2 bg-light">{{ $user->email }}</div>
                    </div>
                </div>
                <p class="small text-muted mb-0 mt-3">Data profil hanya dapat dilihat. Hubungi Admin untuk perubahan data.</p>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card p-4 h-100">
                <p class="fw-semibold mb-3"><i class="bi bi-shield-lock me-1"></i> Ganti Password</p>
                <form method="POST" action="{{ route('password.change') }}">
                    @csrf @method('PUT')
                    <div class="mb-3"><label class="form-label">Password Lama</label><input type="password" name="current_password" class="form-control"></div>
                    <div class="mb-3"><label class="form-label">Password Baru</label><input type="password" name="password" class="form-control"></div>
                    <div class="mb-3"><label class="form-label">Konfirmasi Password Baru</label><input type="password" name="password_confirmation" class="form-control"></div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
