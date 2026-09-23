@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
    <h1>Tambah Tugas</h1>

    @if ($kelasList->isEmpty())
        <p>Kamu belum ditugaskan mengajar di kelas mana pun. Hubungi Admin untuk diatur di menu Kelola Mapel.</p>
    @endif

    <form method="POST" action="{{ route('guru.tugas.store') }}">
        @csrf
        <label>Judul</label>
        <input type="text" name="judul" value="{{ old('judul') }}">
        <br>
        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        <br>
        <label>Kelas</label>
        <select name="kelas_id">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelasList as $k)
                <option value="{{ $k->id }}" @selected(old('kelas_id') == $k->id)>{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        <br>
        <label>Tenggat Waktu</label>
        <input type="datetime-local" name="tenggat_waktu" value="{{ old('tenggat_waktu') }}">
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
