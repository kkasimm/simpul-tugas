@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <h1>Edit Tugas</h1>

    <form method="POST" action="{{ route('guru.tugas.update', $tugas) }}">
        @csrf
        @method('PUT')
        <label>Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $tugas->judul) }}">
        <br>
        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        <br>
        <label>Kelas</label>
        <select name="kelas_id">
            @foreach ($kelasList as $k)
                <option value="{{ $k->id }}" @selected(old('kelas_id', $tugas->kelas_id) == $k->id)>{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        <br>
        <label>Tenggat Waktu</label>
        <input type="datetime-local" name="tenggat_waktu" value="{{ old('tenggat_waktu', $tugas->tenggat_waktu->format('Y-m-d\TH:i')) }}">
        <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
