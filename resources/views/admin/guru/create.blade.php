@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')
    <h1 class="h4 fw-bold mb-3">Tambah Guru</h1>
    <div class="card shadow-sm" style="max-width:480px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.guru.store') }}">
                @csrf
                <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="name" class="form-control" value="{{ old('name') }}"></div>
                <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}"></div>
                <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control"></div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select">
                        <option value="L" @selected(old('jk') == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jk') == 'P')>Perempuan</option>
                    </select>
                </div>
                <p class="text-muted small">Mata pelajaran &amp; kelas yang diajar diatur lewat menu Penugasan Mengajar setelah guru dibuat.</p>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
