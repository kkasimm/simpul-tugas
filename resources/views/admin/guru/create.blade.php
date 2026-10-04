@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')
    <h1>Tambah Guru</h1>
    <div class="card" style="max-width:480px">
        <form method="POST" action="{{ route('admin.guru.store') }}">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            <label>Password</label>
            <input type="password" name="password">
            <label>Jenis Kelamin</label>
            <select name="jk">
                <option value="L" @selected(old('jk') == 'L')>Laki-laki</option>
                <option value="P" @selected(old('jk') == 'P')>Perempuan</option>
            </select>
            <p style="color:var(--text-muted);font-size:13px">Mata pelajaran & kelas yang diajar diatur lewat menu Penugasan Mengajar setelah guru dibuat.</p>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
