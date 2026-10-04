@extends('layouts.app')

@section('title', $tugas->judul)

@section('content')
    <h1>{{ $tugas->judul }}</h1>

    <div class="card" style="max-width:520px">
        <p>{{ $tugas->deskripsi }}</p>
        <p><strong>Mata Pelajaran:</strong> {{ $tugas->mapel->nama_mapel ?? '-' }}</p>
        <p><strong>Tenggat Waktu:</strong> {{ $tugas->tenggat_waktu->format('d M Y H:i') }}</p>

        @if ($pengumpulan)
            <p>
                <strong>Status:</strong>
                <span class="badge badge-{{ $pengumpulan->status }}">{{ ucfirst($pengumpulan->status) }}</span>
                @if ($pengumpulan->terlambat) <span class="badge badge-terlambat">Terlambat</span> @endif
            </p>
            <p><strong>File saat ini:</strong> <a href="{{ \Storage::url($pengumpulan->file_tugas) }}" target="_blank">{{ basename($pengumpulan->file_tugas) }}</a></p>
            @if ($pengumpulan->nilai !== null)
                <p><strong>Nilai:</strong> {{ $pengumpulan->nilai }}</p>
                <p><strong>Komentar:</strong> {{ $pengumpulan->komentar }}</p>
            @endif
        @else
            <p><strong>Status:</strong> <span class="badge badge-belum">Belum</span></p>
        @endif

        <form method="POST" action="{{ route('siswa.tugas.store', $tugas) }}" enctype="multipart/form-data">
            @csrf
            <label>{{ $pengumpulan ? 'Ganti File' : 'Unggah File' }}</label>
            <input type="file" name="file_tugas">
            <button type="submit" class="btn">Kirim</button>
        </form>
    </div>

    <a href="{{ route('siswa.tugas.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
@endsection
