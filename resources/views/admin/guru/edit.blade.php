@extends('layouts.app')
@section('title', 'Edit Guru')
@section('content')
    <h1 class="h4 fw-bold mb-3">Edit Guru</h1>
    <div class="card shadow-sm" style="max-width:480px">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.guru.update', $guru) }}">
                @csrf @method('PUT')
                <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="name" class="form-control" value="{{ old('name', $guru->name) }}"></div>
                <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $guru->email) }}"></div>
                <div class="mb-3"><label class="form-label">Password Baru (opsional)</label><input type="password" name="password" class="form-control"></div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select">
                        <option value="L" @selected(old('jk', $guru->jk) == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jk', $guru->jk) == 'P')>Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
