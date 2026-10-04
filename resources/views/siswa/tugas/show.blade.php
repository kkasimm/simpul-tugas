@extends('layouts.app')
@section('title', $tugas->judul)
@section('content')
    <h1 class="h4 fw-bold mb-3">{{ $tugas->judul }}</h1>

    <div class="card shadow-sm" style="max-width:560px">
        <div class="card-body">
            <p>{{ $tugas->deskripsi }}</p>
            <p><strong>Mata Pelajaran:</strong> {{ $tugas->mapel->nama_mapel ?? '-' }}</p>
            <p><strong>Tenggat Waktu:</strong> {{ $tugas->tenggat_waktu->format('d M Y H:i') }}</p>

            @if ($pengumpulan)
                <p>
                    <strong>Status:</strong>
                    <span class="badge bg-{{ $pengumpulan->status === 'dinilai' ? 'success' : 'primary' }}">{{ ucfirst($pengumpulan->status) }}</span>
                    @if ($pengumpulan->terlambat) <span class="badge bg-danger">Terlambat</span> @endif
                </p>
                <p><strong>File saat ini:</strong> <a href="{{ \Storage::url($pengumpulan->file_tugas) }}" target="_blank">{{ basename($pengumpulan->file_tugas) }}</a></p>
                @if ($pengumpulan->nilai !== null)
                    <p><strong>Nilai:</strong> {{ $pengumpulan->nilai }}</p>
                    <p><strong>Komentar:</strong> {{ $pengumpulan->komentar }}</p>
                @endif
            @else
                <p><strong>Status:</strong> <span class="badge bg-secondary">Belum</span></p>
            @endif

            <form method="POST" action="{{ route('siswa.tugas.store', $tugas) }}" enctype="multipart/form-data" class="mt-3">
                @csrf
                <label class="form-label">{{ $pengumpulan ? 'Ganti File' : 'Unggah File' }}</label>
                <input type="file" name="file_tugas" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>

    <a href="{{ route('siswa.tugas.index') }}" class="btn btn-outline-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection
