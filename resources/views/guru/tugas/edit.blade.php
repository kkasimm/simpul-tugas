@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <h1>Edit Tugas</h1>

    <div class="card" style="max-width:520px">
        <form method="POST" action="{{ route('guru.tugas.update', $tugas) }}">
            @csrf
            @method('PUT')
            <label>Judul Tugas</label>
            <input type="text" name="judul" value="{{ old('judul', $tugas->judul) }}">

            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>

            <label>Kelas &amp; Mata Pelajaran</label>
            <select name="penugasan_id">
                @foreach ($penugasanList as $p)
                    <option value="{{ $p->id }}" @selected(old('penugasan_id', $penugasanSaatIni?->id) == $p->id)>{{ $p->kelas->nama_kelas }} &ndash; {{ $p->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <label>Tanggal Pengumpulan</label>
            <input type="datetime-local" name="tenggat_waktu" value="{{ old('tenggat_waktu', $tugas->tenggat_waktu->format('Y-m-d\TH:i')) }}">

            <label>Status</label>
            <select name="status">
                <option value="draft" @selected(old('status', $tugas->status) == 'draft')>Draft</option>
                <option value="aktif" @selected(old('status', $tugas->status) == 'aktif')>Aktif</option>
                <option value="selesai" @selected(old('status', $tugas->status) == 'selesai')>Selesai</option>
            </select>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
@endsection
