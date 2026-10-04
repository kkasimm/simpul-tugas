@extends('layouts.app')
@section('title', 'Tambah Siswa')
@section('content')
    <h1>Tambah Siswa</h1>
    <div class="card" style="max-width:480px">
        <form method="POST" action="{{ route('admin.siswa.store') }}">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            <label>Password</label>
            <input type="password" name="password">
            <label>Kelas</label>
            <select name="kelas_id">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelasList as $k)
                    <option value="{{ $k->id }}" @selected(old('kelas_id') == $k->id)>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            <label>Jenis Kelamin</label>
            <select name="jk">
                <option value="L" @selected(old('jk') == 'L')>Laki-laki</option>
                <option value="P" @selected(old('jk') == 'P')>Perempuan</option>
            </select>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
