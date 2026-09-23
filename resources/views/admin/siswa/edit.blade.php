@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
    <h1>Edit Siswa</h1>
    <form method="POST" action="{{ route('admin.siswa.update', $siswa) }}">
        @csrf @method('PUT')
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name', $siswa->name) }}">
        <br>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $siswa->email) }}">
        <br>
        <label>Password Baru (opsional, kosongkan kalau tidak ganti)</label>
        <input type="password" name="password">
        <br>
        <label>Kelas</label>
        <select name="kelas_id">
            @foreach ($kelasList as $k)
                <option value="{{ $k->id }}" @selected(old('kelas_id', $siswa->kelas_id) == $k->id)>{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        <br>
        <label>Jenis Kelamin</label>
        <select name="jk">
            <option value="L" @selected(old('jk', $siswa->jk) == 'L')>Laki-laki</option>
            <option value="P" @selected(old('jk', $siswa->jk) == 'P')>Perempuan</option>
        </select>
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
