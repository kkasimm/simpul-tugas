@extends('layouts.app')
@section('title', 'Kelola Tugas')
@section('content')
    <h1 class="h4 fw-bold mb-3">Kelola Tugas</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p class="fw-semibold">Buat Tugas Baru</p>
            <form method="POST" action="{{ route('guru.tugas.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Tugas" value="{{ old('judul') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="2">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Kelas &amp; Mata Pelajaran</label>
                        <select name="penugasan_id" class="form-select">
                            <option value="">-- Pilih Kelas &amp; Mapel --</option>
                            @foreach ($penugasanList as $p)
                                <option value="{{ $p->id }}" @selected(old('penugasan_id') == $p->id)>{{ $p->kelas->nama_kelas }} &ndash; {{ $p->mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Pengumpulan</label>
                        <input type="datetime-local" name="tenggat_waktu" class="form-control" value="{{ old('tenggat_waktu') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                            <option value="aktif" @selected(old('status', 'aktif') == 'aktif')>Aktif</option>
                            <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                        </select>
                    </div>
                </div>

                @if ($penugasanList->isEmpty())
                    <div class="alert alert-warning py-2">Kamu belum ditugaskan mengajar di kelas manapun. Hubungi Admin.</div>
                @endif

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <p class="fw-semibold">Tugas</p>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm align-middle">
            <thead>
                <tr>
                    <th>Nama Tugas</th><th>Kelas</th><th>Mata Pelajaran</th><th>Tanggal Pengumpulan</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tugas as $t)
                    <tr>
                        <td>{{ $t->judul }}</td>
                        <td>{{ $t->kelas->nama_kelas }}</td>
                        <td>{{ $t->mapel->nama_mapel ?? '-' }}</td>
                        <td>{{ $t->tenggat_waktu->format('d M Y') }}</td>
                        <td><span class="badge bg-{{ $t->status === 'aktif' ? 'primary' : ($t->status === 'selesai' ? 'success' : 'secondary') }}">{{ ucfirst($t->status) }}</span></td>
                        <td>
                            <a href="{{ route('guru.tugas.pengumpulan', $t) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-star"></i> Nilai</a>
                            <a href="{{ route('guru.tugas.edit', $t) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Edit</a>
                            <form method="POST" action="{{ route('guru.tugas.destroy', $t) }}" class="d-inline js-confirm-delete" data-message="Tugas '{{ $t->judul }}' akan dihapus permanen.">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada tugas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
