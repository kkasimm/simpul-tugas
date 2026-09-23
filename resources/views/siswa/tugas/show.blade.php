@extends('layouts.app')

@section('title', $tugas->judul)

@section('content')
    <h1>{{ $tugas->judul }}</h1>
    <p>{{ $tugas->deskripsi }}</p>
    <p>Tenggat Waktu: {{ $tugas->tenggat_waktu->format('d M Y H:i') }}</p>

    @if ($pengumpulan)
        <p>Status: {{ $pengumpulan->status }} @if ($pengumpulan->terlambat) (terlambat) @endif</p>
        <p>File saat ini: <a href="{{ \Storage::url($pengumpulan->file_tugas) }}" target="_blank">{{ basename($pengumpulan->file_tugas) }}</a></p>
        @if ($pengumpulan->nilai !== null)
            <p>Nilai: {{ $pengumpulan->nilai }}</p>
            <p>Komentar: {{ $pengumpulan->komentar }}</p>
        @endif
    @else
        <p>Status: belum</p>
    @endif

    <form method="POST" action="{{ route('siswa.tugas.store', $tugas) }}" enctype="multipart/form-data">
        @csrf
        <label>{{ $pengumpulan ? 'Ganti File' : 'Unggah File' }}</label>
        <input type="file" name="file_tugas">
        <button type="submit">Kirim</button>
    </form>

    <a href="{{ route('siswa.tugas.index') }}">&laquo; Kembali</a>
@endsection
