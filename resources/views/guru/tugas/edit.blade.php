@extends('layouts.app')
@section('title', 'Edit Tugas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Edit Tugas</h1>
    <div class="card shadow-sm" style="max-width:560px">
        <div class="card-body">
            <form method="POST" action="{{ route('guru.tugas.update', $tugas) }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $tugas->judul) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="2">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas &amp; Mata Pelajaran</label>
                    <select name="penugasan_id" class="form-select">
                        @foreach ($penugasanList as $p)
                            <option value="{{ $p->id }}" @selected(old('penugasan_id', $penugasanSaatIni?->id) == $p->id)>{{ $p->kelas->nama_kelas }} &ndash; {{ $p->mapel->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pengumpulan</label>
                    <input type="datetime-local" name="tenggat_waktu" class="form-control" value="{{ old('tenggat_waktu', $tugas->tenggat_waktu->format('Y-m-d\TH:i')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" @selected(old('status', $tugas->status) == 'draft')>Draft</option>
                        <option value="aktif" @selected(old('status', $tugas->status) == 'aktif')>Aktif</option>
                        <option value="selesai" @selected(old('status', $tugas->status) == 'selesai')>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('guru.tugas.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
